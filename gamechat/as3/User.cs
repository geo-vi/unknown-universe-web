using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Sockets;
using System.Text;

namespace DarkorbitChat.Game
{
    public class User
    {
        private Socket _handler;
        private readonly byte[] _buffer = new byte[2048];
        public int UserId { get; set; }
        public string Username { get; set; }
        public string SessionId { get; set; }
        public string Clan { get; set; }

        public List<Int32> ChatsJoined { get; set; }

        public bool IsAdministrator { get; set; }

        public User(Socket handler)
        {
            _handler = handler;
            UserId = -1;
            Username = "";
            SessionId = "";
            Clan = "";
            IsAdministrator = false;
            ChatsJoined = new List<int>();

            _handler.BeginReceive(_buffer, 0, _buffer.Length, 0,ReadCallBack, this);
        }

        private void ReadCallBack(IAsyncResult result)
        {
            try
            {
                var bytesread = _handler.EndReceive(result);
                var content = Encoding.UTF8.GetString(_buffer, 0, bytesread);

                if (content.Trim() == "")
                {
                    return;
                }
                if (content.StartsWith("<policy-file-request/>"))
                {
                    Send("<?xml version=\"1.0\"?><cross-domain-policy xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xsi:noNamespaceSchemaLocation=\"http://www.adobe.com/xml/schemas/PolicyFileSocket.xsd\"><allow-access-from domain=\"*\" to-ports=\"*\" secure=\"false\" /><site-control permitted-cross-domain-policies=\"master-only\" /></cross-domain-policy>");
                }
                else if (content.StartsWith("bu"))
                {
                    var packet = content.Replace("@", "%").Split('%');
                    Clan = packet[7];
                    Username = packet[2];    
                    if (Clan == "noclan")
                    {
                        Clan = "";
                    }
                    SessionId = packet[4];
                    UserId = Convert.ToInt32(packet[3]);
                    if (Program.IsUserBanned(Username))
                    {
                        _handler.Shutdown(SocketShutdown.Both);
                        _handler.Close();
                        _handler = null;
                        return;
                    }
                    if (Program.Users.ContainsKey(UserId))
                    {
                        Program.Users[UserId]._handler.Shutdown(SocketShutdown.Both);
                        Program.Users[UserId]._handler.Close();
                        Program.Users[UserId]._handler = null;
                        Program.Users.Remove(UserId);
                    }
                    Program.Users.Add(UserId, this);
                    IsAdministrator = Program.IsUserAdministrator(Username);
                    Send("bv%" + UserId + "#");
                    var servers = Program.Chatrooms.Aggregate(String.Empty, (current, chat) => current + chat.Value.ToString());
                    servers = servers.Remove(servers.Length - 1);
                    Send("by%" + servers + "#");
                    ChatsJoined.Add(Program.Chatrooms.FirstOrDefault().Value.Id);
                    Program.AddLog(Username, "", "Connected!");
                }
                else if (content.StartsWith("a"))
                {
                    var packet = content.Replace("@","%").Split('%');
                    var roomId = packet[1];
                    var message = packet[2];

                    var cmd = message.Split(' ')[0];
                    if (message.StartsWith("/users"))
                    {
                        var users = Program.Users.Values.Aggregate(String.Empty, (current, user) => current + user.Username + ", ");

                        users =  users.Remove(users.Length - 2);         
                      Send("fk%" + roomId + "@" + "Users online " + Program.Users.Count + ": " + users + "#");
                      Program.AddLog(Username, "Server", "/users requested!");
                    }
                    else if (cmd == "/system")
                    {
                        if (IsAdministrator)
                        {
                            var msg = message.Split(' ')[1];
                            foreach (var pair in Program.Users)
                            {
                                foreach (var chat in pair.Value.ChatsJoined)
                                {
                                      pair.Value.Send("fk%" + chat + "@" + msg + "#"); 
                                      Program.AddLog(Username, "All Users(systemmsg)",msg );
                                }                             
                            }
                        }
                        else
                        {
                            Send("fk%" + roomId + "@" + "Sorry, but you don't have the rights to do this!" + "#");
                        }                      
                    }
                    else if (message.StartsWith("/reconnect"))
                    {

                        _handler.Shutdown(SocketShutdown.Both);
                        _handler.Close();
                        _handler = null;
                        Program.Users.Remove(UserId);
                        Program.AddLog(Username, "", "Reconnect requested");
                    }
                    else if (cmd == "/kick")
                    {
                        if (IsAdministrator)
                        {
                            var user = message.Split(' ')[1];
                            foreach (var pair in Program.Users)
                            {
                                if (String.Equals(pair.Value.Username, user, StringComparison.CurrentCultureIgnoreCase))
                                {
                                    pair.Value.Send("as%#");
                                    pair.Value._handler.Shutdown(SocketShutdown.Both);
                                    pair.Value._handler.Close();
                                    pair.Value._handler = null;
                                    Program.Users.Remove(pair.Key);
                                    Program.AddLog(Username, user, "Kicked client");
                                    return;
                                }
                            }
                        }
                        else
                        {
                            Send("fk%" + roomId + "@" + "Sorry, but you do not have the rights to do this!" + "#");
                        }   
                    }
                    else if (cmd == "/ban")
                    {
                        if (IsAdministrator)
                        {
                            var user = message.Split(' ')[1];
                            foreach (var pair in Program.Users)
                            {
                                if (pair.Value.Username.ToLower() == user.ToLower())
                                {
                                    pair.Value.Send("at%#");
                                    pair.Value._handler.Shutdown(SocketShutdown.Both);
                                    pair.Value._handler.Close();
                                    pair.Value._handler = null;
                                    Program.Users.Remove(pair.Key);
                                    Program.BanUser(pair.Value.Username);
                                    Program.AddLog(Username, user, "Banned client");
                                    return;
                                }
                            }
                        }
                        else
                        {
                            Send("fk%" + roomId + "@" + "Sorry, but you do not have the rights to do this!" + "#");
                        }
                    }
                    else if (cmd == "/unban")
                    {
                        if (IsAdministrator)
                        {
                          var user = message.Split(' ')[1];
                           
                          Program.UnbanUser(user);
                          Program.AddLog(Username, user, "Unbanned client");
                        }
                        else
                        {
                            Send("fk%" + roomId + "@" + "Sorry, but you do not have the rights to do this!" + "#");
                        }
                    }
                    else if (cmd == "/banip")
                    {
                        if (IsAdministrator)
                        {
                            var user = message.Split(' ')[1];
                            foreach (var pair in Program.Users)
                            {
                                if (pair.Value.Username.ToLower() == user.ToLower())
                                {
                                    pair.Value.Send("at%#");
                                    var ip = pair.Value._handler.RemoteEndPoint.ToString().Split(':')[0];
                                    Program.BanIp(ip);
                                    pair.Value._handler.Shutdown(SocketShutdown.Both);
                                    pair.Value._handler.Close();
                                    pair.Value._handler = null;
                                    Program.Users.Remove(pair.Key);
                                    Program.AddLog(Username, ip, "Banned ip");
                                    return;
                                }
                            }
                        }
                        else
                        {
                            Send("fk%" + roomId + "@" + "Sorry, but you do not have the rights to do this!" + "#");
                        }
                    }
                    else if (cmd == "/unbanip")
                    {
                        if (IsAdministrator)
                        {
                            var user = message.Split(' ')[1];

                            Program.UnbanIp(user);
                            Program.AddLog(Username, user, "Unbanned ip");
                        }
                        else
                        {
                            Send("fk%" + roomId + "@" + "Sorry, but you do not have the rights to do this!" + "#");
                        }
                    }
                    else if (cmd == "/w")
                    {
                        foreach (var pair in Program.Users)
                        {
                            
                            var user = message.Split(' ')[1];

                            if (user.ToLower() == Username.ToLower())
                            {

                                Send("fk%" + roomId + "@" + "Error, you can't whisper yourself." + "#");
                                return;
                            }
                            if (String.Equals(pair.Value.Username.ToLower(), user.ToLower(), StringComparison.CurrentCultureIgnoreCase) && pair.Value.ChatsJoined.Contains(Convert.ToInt32(roomId)))
                            {
                                message = message.Remove(0, user.Length + 4);
                                pair.Value.Send("cv%" + Username + "@" + message + "#");
                                Send("cw%" + user + "@" + message + "#");
                                Program.AddLog(Username, user, "Whisper: " + message);
                                return;
                            }
                        }
                    }
                    else if (cmd == "/create")
                    {
                        var chat = new CustomChatRoom
                        {
                            Name = message.Split(' ')[1],
                            Id = new Random().Next(700, 999),
                            Administrator = Username
                        };
                    Send("cj%" + chat.Id + "@" + chat.Name + "@" +
                        UserId + "@" + Username + "#");
                        
                        Program.PrivateChats.Add(chat);
                        Program.AddLog(Username, "", "Created room: " + chat.Name);
                    }
                    else if (cmd == "/invite")
                    {
                        var user = message.Split(' ')[1];
                         var roomname = "";
                        var userfound = false;
                        User userf = null;
                        foreach (var usern in Program.Users.Where(usern => usern.Value.Username.ToLower() == user.ToLower()))
                        {
                            userfound = true;
                            userf = usern.Value;
                        }
                        
                        if (!userfound)
                        {
                            Send("cp#");
                            return;
                        }

                        foreach (var rm in Program.PrivateChats.Where(rm => Convert.ToInt32(roomId) == rm.Id))
                        {
                            roomname = rm.Name;
                        }
                        if (userf == null) return;
                        Send("cr%" + user + "#");
                        userf.Send("cj%" + roomId + "@" + roomname + "@" + UserId + "@" + Username + "#");
                        Program.AddLog(Username, user, "Invited to room");
                    }
                    else if (cmd == "/close")
                    {
                        var userfound = false;
                        var chat = new CustomChatRoom();
                        foreach (var usern in Program.PrivateChats.Where(usern => usern.Id == Convert.ToInt32(roomId)))
                        {
                            userfound = true;
                            chat = usern;
                        }
                        if (!userfound)
                        {
                             Send("fk%" + roomId + "@" + "Error, you can't close this chat!" + "#");
                             return;
                        }
                        if (chat.Administrator.ToLower() != Username.ToLower())
                        {
                            Send("fk%" + roomId + "@" + "Error, you can't close this chat!" + "#");
                            return;
                        }
                        foreach (var u in chat.Users)
                        {
                            u.Send("ck%" + chat.Id + "#");
                        }    
                        Program.AddLog(Username, "", "closed room: " + chat.Name);
                        Program.PrivateChats.Remove(chat);             
                    }
                    else if (cmd == "/leave")
                    {
                        var userfound = false;
                        var chat = new CustomChatRoom();
                        foreach (var usern in Program.PrivateChats)
                        {
                            if (usern.Id == Convert.ToInt32(roomId))
                            {
                                userfound = true;
                                chat = usern;
                            }
                        }
                        if (!userfound)
                        {
                            Send("fk%" + roomId + "@" + "Error, you can't leave this chat!" + "#");
                            return;
                        }
                        chat.Users.Remove(this);
                        var close = false;
                        foreach (var u in chat.Users)
                        {
                            if (Username.ToLower() == chat.Administrator.ToLower())
                            {
                                u.Send("ck%" + chat.Id + "#");
                                close = true;
                            }
                            else
                            {
                                u.Send("eb%" + UserId + "@" + Username + "@" + chat.Id + "#");
                            }
                        }
                       Send("ck%" + chat.Id + "#");
                        Program.AddLog(Username, "", "left room: " + chat.Name);
                        if (close || chat.Users.Count == 0)
                        {
                            Program.AddLog(Username, "", "closed room: " + chat.Name);
                            Program.PrivateChats.Remove(chat);
                        }
                    }
                    else
                    {
                        Program.AddLog(Username, roomId, message);
                        foreach (var pair in Program.Users)
                        { 
                            if (pair.Value.ChatsJoined.Contains(Convert.ToInt32(roomId)))
                            {
                                if (IsAdministrator)
                                {
                                    if (Clan == "")
                                    {
                                        pair.Value.Send("j%" + roomId + "@" + Username + "@" + message + "#");
                                    }
                                    else
                                    {
                                        pair.Value.Send("j%" + roomId + "@" + Username + "@" + message + "@" + Clan + "#");
                                    }
                                }
                                else
                                {
                                    if (Clan == "")
                                    {
                                        pair.Value.Send("a%" + roomId + "@" + Username + "@" + message + "#");
                                    }
                                    else
                                    {
                                        pair.Value.Send("a%" + roomId + "@" + Username + "@" + message + "@" + Clan + "#"); 
                                    }
                                }
                               
                            }                                        
                        }
                    }
                   
                }
                else if (content.StartsWith("bz"))
                {
                   
                    var oldchat = Convert.ToInt32(content.Split('%')[1]);
                    var newchat = Convert.ToInt32(content.Split('%')[2].Split('@')[0]);
                    foreach (var chat in Program.PrivateChats.Where(chat => chat.Id == newchat && oldchat == newchat))
                    {
                        chat.Users.Add(this);
                        foreach (var user in chat.Users.Where(user => Username != user.Username))
                        {
                            user.Send("ea%" + Username + "%" + newchat + "#");
                        }
                    }
                    if (!ChatsJoined.Contains(newchat))
                    {
                        ChatsJoined.Add(newchat);
                    }
                }
              
            }
            catch
            {

            }
            finally
            {
                if (_handler != null && _handler.Connected)
                {
                    try
                    {
                        _handler.BeginReceive(_buffer, 0, _buffer.Length, 0,
                             ReadCallBack, this);
                    }
                    catch
                    {
                        
                    }
                   
                }
            }
        }

        private void Send(string str)
        {
            try
            {
                if (_handler == null || !_handler.Connected) return;
                var byteData = Encoding.UTF8.GetBytes(str + (char) 0x00);


                _handler.BeginSend(byteData, 0, byteData.Length, 0,
                    SendCallBack, _handler);
            }
            catch
            {
            }
        }

        private void SendCallBack(IAsyncResult result)
        {
            try
            {
                var handler = (Socket) result.AsyncState;
                handler.EndSend(result);
            }
// ReSharper disable once EmptyGeneralCatchClause
            catch
            {
            }
        }
    }
}
