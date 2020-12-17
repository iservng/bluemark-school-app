USE bluemark;
DROP TABLE IF EXISTS class_subjects;
CREATE TABLE class_subjects (
  class_id          INT(11) NOT NULL,
  subject_id        INT(11) NOT NULL,
  subject_status    INT(1)              DEFAULT 1,

  PRIMARY KEY (class_id, subject_id)
) ;



