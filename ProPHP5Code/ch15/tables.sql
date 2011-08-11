CREATE TABLE user_session (
  "id" SERIAL PRIMARY KEY NOT NULL,
  "ascii_session_id" character varying(32),
  "logged_in" bool,
  "user_id" int4,
  "last_impression" timestamp,
  "created" timestamp,	
  "user_agent" character varying(256)
);

CREATE TABLE "user" (
  "id" SERIAL PRIMARY KEY NOT NULL,
  "username" character varying(32),
  "md5_pw" character varying(32),
  "first_name" character varying(64),	
  "last_name" character varying(64)
);

CREATE TABLE "session_variable" (
  "id" SERIAL PRIMARY KEY NOT NULL,
  "session_id" int4,
  "variable_name" character varying(64),
  "variable_value" text
);
