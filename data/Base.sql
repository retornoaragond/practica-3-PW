CREATE TABLE "libros" (
	"id"	INTEGER NOT NULL,
	"title"	TEXT NOT NULL,
	"edition"	TEXT NOT NULL,
	"copyright"	INTEGER NOT NULL,
	"language"	TEXT NOT NULL,
	"pages"	INTEGER NOT NULL,
	"author"	TEXT,
	"author_id"	INTEGER,
	"publisher"	TEXT,
	"publisher_id"	INTEGER,
	PRIMARY KEY("id" AUTOINCREMENT)
);

insert into libros ("title", "edition", "copyright", "language", "pages", "author", "author_id", "publisher", "publisher_id")
values ( "Operating System Concepts", "9th", 2012, "ENGLISH", 976, "Abraham Silberschatz", 1, "John Wiley & Sons", 1);

insert into libros ("title", "edition", "copyright", "language", "pages", "author", "author_id", "publisher", "publisher_id")
values ( "Database System Concepts",	"6th",	2010,	"ENGLISH",	1376,	"Abraham Silberschatz",	1,	"John Wiley & Sons",	1);

insert into libros ("title", "edition", "copyright", "language", "pages", "author", "author_id", "publisher", "publisher_id")
values ( "Computer Networks",	"5th",	2010,	"ENGLISH",	960,	"Andrew S. Tanenbaum",	2,	"Pearson Education",	2);

insert into libros ("title", "edition", "copyright", "language", "pages", "author", "author_id", "publisher", "publisher_id")
values ( "Modern Operating Systems",	"4th",	2014,	"ENGLISH",	1136,	"Andrew S. Tanenbaum",	2,	"Pearson Education",	2);

CREATE TABLE "autores" (
	"id"	INTEGER NOT NULL,
	"author"	TEXT NOT NULL,
	"nationality"	TEXT NOT NULL,
	"birth_year"	INTEGER NOT NULL,
	"fields"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);

insert into autores ("author",	"nationality",	"birth_year",	"fields")
values ("Abraham Silberschatz",	"Israelis / American",	1952,	"Database Systems, Operating Systems");

insert into autores ("author",	"nationality",	"birth_year",	"fields")
values ("Andrew S. Tanenbaum",	"Dutch / American",	1944,	"Distributed computing, Operating Systems");

CREATE TABLE "editoriales" (
	"id"	INTEGER NOT NULL,
	"publisher"	TEXT NOT NULL,
	"country"	TEXT NOT NULL,
	"founded"	INTEGER NOT NULL,
	"genere"	TEXT NOT NULL,
	PRIMARY KEY("id" AUTOINCREMENT)
);

insert into editoriales ("publisher",	"country",	"founded",	"genere")
values ("John Wiley & Sons",	"United States",	1807,	"Academic");

insert into editoriales ("publisher",	"country",	"founded",	"genere")
values ("Pearson Education",	"United Kingdom",	1844,	"Education");
