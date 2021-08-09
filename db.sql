CREATE TABLE learner(
 learnerID int(10) NOT NULL primary key AUTO_INCREMENT,
 fname varchar(100) not null,
 lname varchar(100) not null,
 dob datetime not null,
 grade int not null,
 sex enum('Male','Female'),
 Address text
)ENGINE=InnoDB;

CREATE TABLE guardian (
guardianID int(100) not null primary key AUTO_INCREMENT,
firstName varchar(100) not null,
lastName varchar(100) not null,
contactNumber varchar(100) not null,
Address text,
learnerID int not null,
foreign key (learnerID) references learner(learnerID)
)ENGINE=InnoDB;

CREATE TABLE ScreeningRegistry (
    ScreeningID int(100) not null primary key AUTO_INCREMENT,
    learnerID int(100) not null,
    thinkMDSuspectedDiagnosis varchar(100) not null,
    MedicationSupplied text,
    referred enum('Y','N') not null,
    FollowUpDate date,
    ClinicDiagnosis varchar(100) not null,
    foreign key (learnerID) references learner(learnerID)
)ENGINE=InnoDB;

DROP TABLE IF EXISTS lessonplan;
CREATE TABLE IF NOT EXISTS lessonplan (
    lessonID int(100) not null primary key AUTO_INCREMENT,
    duration int(100) not null,
    dateRecorded date,
    grade varchar(100) not null,
    healthtopic varchar(100) not null,
    subtopic varchar(100) not null,
    Objective text,
    keyMessage text,
    TeachingMethod varchar(100),
    EvaluationMethod varchar(100),
    NumberOfLearners int(10)  null,
)ENGINE=InnoDB;

DROP TABLE IF EXISTS lessonplansignup;
CREATE TABLE IF NOT EXISTS lessonplansignup(
    signupID int(10) not null primary key AUTO_INCREMENT,
    learnerID int not null,
    lessonID int not null,
     foreign key (learnerID) references learner(learnerID),
     foreign key (lessonID) references lessonplan(lessonID)
)ENGINE=InnoDB;


DROP TABLE IF EXISTS user;
CREATE TABLE IF NOT EXISTS user (
  `ID` int(20) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` int(11) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB;