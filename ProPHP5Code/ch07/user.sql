CREATE TABLE "user" (
 "id" SERIAL PRIMARY KEY NOT NULL,
 "username" character varying(32),
 "first_name" character varying(64),   
 "last_name" character varying(64)     
);
COPY "user" (id, username, first_name, last_name) FROM stdin;
1       ed              Ed      Lecky-Thompson
2       steve           Steve   Nowicki
3       alec            Alec    Cove
4       heow            Heow    Eide-Goodman
5       john            John    Doe
6       jane            Jane    Doe
\.
SELECT pg_catalog.setval('user_id_seq', 6, true);
