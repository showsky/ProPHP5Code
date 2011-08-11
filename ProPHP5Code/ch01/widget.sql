CREATE TABLE "widget" (
  "widgetid" SERIAL PRIMARY KEY NOT NULL,
  "name" varchar(255) NOT NULL,
  "description" text
);
INSERT INTO "widget" ("name", "description") 
VALUES('Foo', 'This is a footacular widget!');
