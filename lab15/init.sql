create table author(
 id      serial,
 name    varchar(100),
 surname varchar(100),
 country varchar(100)
);

create table book(
 id          serial,
 title       varchar(100),
 description text,
 year        integer,
 pages       integer,
 photo       varchar(100)
);

create table book_author(
 book_id   integer references book(id),
 author_id integer references author(id)
);

insert into author(name, surname, country) values
('Джоан','Роулінг','Велика Британія'),
('Стефені','Меєр','США'),
('Маркус','Зузак','Австралія');

insert into book(title, description, year, pages, photo) values
('Гаррі Поттер і філософський камінь','Перший роман серії «Гаррі Поттер»',2017,320,'HPandPhStone_Ukr.jpg'),
('Гаррі Поттер і таємна кімната','Другий роман серії «Гаррі Поттер»',2017,352,'HPand_the_Chamber_of_Secrets_UKR.jpg'),
('Сутінки','Перший роман «Сутінкової саги»',2009,512,'Twilightbook.jpg'),
('Крадійка книжок','',2016,416,'Kradijka_knyczok.jpg');
