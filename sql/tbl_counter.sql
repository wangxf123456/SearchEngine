CREATE table Counter (
	counterName char(20),
	count integer,
	primary key (counterName)
);

INSERT INTO Counter (counterName, count)
VALUES ('AlbumCount', 4);

INSERT INTO Counter (counterName, count)
VALUES ('PhotoCount', 30);