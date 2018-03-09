-- noinspection SqlDialectInspectionForFile

CREATE DATABASE company_db;

USE company_db;

CREATE TABLE employee_data
(employee_name varchar(30) NOT NULL,
employee_address text NOT NULL,
age int(2) NOT NULL,
language_spoken text NOT NULL,
is_married int(1) NOT NULL);

DESC employee_data;