
INSERT INTO "student"(name) VALUES('Bob Smith');      -- studentid 1
INSERT INTO "student"(name) VALUES('John Doe');       -- studentid 2
INSERT INTO "student"(name) VALUES('Jane Baker');     -- studentid 3

INSERT INTO "course"("coursecode", "name") 
    VALUES('CS101', 'Intro to Computer Science');   -- courseid 1
INSERT INTO "course"("coursecode", "name") 
    VALUES('HIST369', 'British History 1945-1990'); -- courseid 2
INSERT INTO "course"("coursecode", "name") 
    VALUES('BIO546', 'Advanced Genetics');          -- courseid 3

INSERT INTO "studentcourse"("studentid", "courseid") VALUES(1, 1);
INSERT INTO "studentcourse"("studentid", "courseid") VALUES(1, 2);
INSERT INTO "studentcourse"("studentid", "courseid") VALUES(1, 3);
INSERT INTO "studentcourse"("studentid", "courseid") VALUES(2, 1);
INSERT INTO "studentcourse"("studentid", "courseid") VALUES(2, 3);
INSERT INTO "studentcourse"("studentid", "courseid") VALUES(3, 2);
