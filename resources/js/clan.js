class clan {
    constructor(){
        clan.searchKeyword = "";
        clan.listClans();
    }

    static listClans(){
        var clanTable = document.getElementsByClassName("table");
        clanTable.innerHTML = "<tr><td>" + 1 + "a</td><td>CLANNAME</td><td>SHORTDESCRIPTION</td><td>50/50</td><td>EIC</td><td>ACCEPTING Levl 200+</td></tr>";
        // $('.clan-bottom-list-container > table').empty();
        // for (var i = 0; i < 20; i++){
        //     $('.clan-bottom-list-container > table').innerHTML = "<tr><td>" + i + "a</td><td>CLANNAME</td><td>SHORTDESCRIPTION</td><td>50/50</td><td>EIC</td><td>ACCEPTING Levl 200+</td></tr>";
        // }
    }
}