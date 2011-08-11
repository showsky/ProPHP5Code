CREATE TABLE "entityphone" (
  "phoneid" int SERIAL PRIMARY KEY NOT NULL,
  "entityid" int,
  "snumber" varchar(20),
  "sextension" varchar(20),
  "stype" varchar(50),
  CONSTRAINT "fk_entityemail_entityid"
    FOREIGN KEY ("entityid") REFERENCES "entity"("entityid")
);
