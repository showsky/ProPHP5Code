CREATE TABLE "student" (
  "studentid" SERIAL NOT NULL PRIMARY KEY,
  "name" varchar(255)
);

CREATE TABLE "course" (
  "courseid" SERIAL NOT NULL PRIMARY KEY,
  "coursecode" varchar(10),
  "name" varchar(255)
);

CREATE TABLE "studentcourse" (
  "studentid" integer,
  "courseid" integer,
  CONSTRAINT "fk_studentcourse_studentid" 
    FOREIGN KEY ("studentid") 
    REFERENCES "student"("studentid"),
  CONSTRAINT "fk_studentcourse_courseid" 
    FOREIGN KEY ("courseid") 
    REFERENCES "course"("courseid")
);

CREATE UNIQUE INDEX "idx_studentcourse_unique" 
    ON "studentcourse"("studentid", "courseid");
