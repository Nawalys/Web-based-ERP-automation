# Web Based ERP automation
 My project requested from me in the company where I work as an intern

I will continue to develop a little more because I am out of the standards


for the database;

CREATE DATABASE projestaj;
CREATE TABLE certificates (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL
)
CREATE TABLE departments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL
)
CREATE TABLE examinationFollowUp (
  id INT AUTO_INCREMENT PRIMARY KEY,
  staffId INT NOT NULL,
  examinationId INT NOT NULL
)
CREATE TABLE examinationProcess (
  id INT AUTO_INCREMENT PRIMARY KEY,
  doctorId INT NOT NULL,
  staffId INT NOT NULL,
  time DATETIME NOT NULL,
  examinationId INT NOT NULL,
  comment VARCHAR(250)
)
CREATE TABLE examinations (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL
)
CREATE TABLE positions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(20) NOT NULL
)
CREATE TABLE staff (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tc INT NOT NULL,
  name VARCHAR(20) NOT NULL,
  surname VARCHAR(20) NOT NULL,
  birthday DATE NOT NULL,
  gender VARCHAR(20) NOT NULL,
  phoneNumber INT NOT NULL,
  email VARCHAR(50) NOT NULL,
  adrress VARCHAR(250) NOT NULL,
  startDate DATETIME NOT NULL,
  department VARCHAR(30) NOT NULL,
  position VARCHAR(30) NOT NULL,
  password VARCHAR(50) NOT NULL
)
CREATE TABLE staffCertificates (
  id INT AUTO_INCREMENT PRIMARY KEY,
  staffId INT NOT NULL,
  certificateId INT NOT NULL
)
CREATE TABLE supports (
  id INT AUTO_INCREMENT PRIMARY KEY,
  staffId INT NOT NULL,
  technicalStaffId INT NOT NULL,
  subject VARCHAR(50) NOT NULL,
  explanation VARCHAR(500) NOT NULL,
  situation VARCHAR(50) NOT NULL
)
CREATE TABLE trainingProcess (
  id INT AUTO_INCREMENT PRIMARY KEY,
  trainingId INT NOT NULL,
  engineerStaffId INT NOT NULL,
  welderStaffId INT NOT NULL,
  time DATETIME NOT NULL,
  situation VARCHAR(50) NOT NULL
)
CREATE TABLE trainings (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL
)
