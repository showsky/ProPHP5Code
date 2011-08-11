CREATE TABLE "entityemail" (
  "emailid" SERIAL PRIMARY KEY NOT NULL,
  "entityid" int,
  "semail" varchar(255),
  "stype" varchar(50),
  CONSTRAINT "fk_entityemail_entityid"
    FOREIGN KEY ("entityid") REFERENCES "entity"("entityid")
);
