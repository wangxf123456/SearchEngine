create table Article (

        articleid char(10),
        title char(60),
        imgurl   char(255),
        Primary key (articleid)
);

create table Category (
        articleid char(10),
        category char(100)
);

create table Infobox (
        articleid char(10),
        infotitle char (60),
        info TEXT
);

