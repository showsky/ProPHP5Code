CREATE TABLE "entityaddress" (
  "addressid" SERIAL PRIMARY KEY NOT NULL,
  "entityid" int,
  "saddress1" varchar(255),
  "saddress2" varchar(255),
  "scity" varchar(255),
  "cstate" char(2),
  "spostalcode" varchar(10),
  "stype" varchar(50),
  CONSTRAINT "fk_entityaddress_entityid"
    FOREIGN KEY ("entityid") REFERENCES "entity"("entityid")
);
