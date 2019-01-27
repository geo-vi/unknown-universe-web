![Unknown Universe](https://bytebucket.org/UnknownUniverse/emulator/raw/75f572c43b9a3251484e153bffc7bb0bb642e565/logo.png?token=503227c3a922a6b43af1f808f923e52cdc9cb945)
 ___
[Project / Trello](https://trello.com/b/VY7zXWUB/unkown-universe)

Project started in 2016. Reboot by Shock & Avyiel


# Current stage: Development

## Coding syntax
Trying to short the Code as much as possible while keeping the performance high as possible, for fast loading times.

## Docker Instructions

1. Install docker and docker-compose
2. Run `make build` followed by `make run`
3. To reload changes run `make reload`

## Setting up MariaDB

1. Setup docker or XAMPP/LAMPP
2. Open the phpMyAdmin dashboard
3. Head to the *Import* tab
4. Import `database/do_system.sql`
5. Import `database/do_server_ge1.sql`

## Developers
Currently only Shock, Avyiel and Adrian187.
