CREATE DATABASE hospital_db;
USE hospital_db;
CREATE TABLE admin(
admin_id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50),
password VARCHAR(50)
);

CREATE TABLE doctors(
doctor_id INT AUTO_INCREMENT PRIMARY KEY,
doctor_name VARCHAR(100),
specialization VARCHAR(100),
phone VARCHAR(15),
availability VARCHAR(20)
);

CREATE TABLE nurses(
nurse_id INT AUTO_INCREMENT PRIMARY KEY,
nurse_name VARCHAR(100),
department VARCHAR(100)
);

CREATE TABLE staff(
staff_id INT AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(100),
designation VARCHAR(100)
);

CREATE TABLE patients(
patient_id INT AUTO_INCREMENT PRIMARY KEY,
patient_name VARCHAR(100),
gender VARCHAR(10),
age INT,
doctor_id INT
);

CREATE TABLE rooms(
room_id INT AUTO_INCREMENT PRIMARY KEY,
room_number INT,
room_type VARCHAR(50),
status VARCHAR(20),
cost INT
);

CREATE TABLE bills(
bill_id INT AUTO_INCREMENT PRIMARY KEY,
patient_id INT,
amount INT,
status VARCHAR(20)
);

CREATE TABLE appointments(
appointment_id INT AUTO_INCREMENT PRIMARY KEY,
patient_id INT,
doctor_id INT,
date DATE
);

INSERT INTO admin(username,password) VALUES('admin','admin123');

INSERT INTO doctors(doctor_name,specialization,phone,availability) VALUES
('Dr Ravi','Cardiologist','9876543210','Available'),
('Dr Kumar','Dentist','9871111111','Available'),
('Dr Anjali','Neurologist','9872222222','Not Available'),
('Dr Priya','Pediatrician','9873333333','Available'),
('Dr Sharma','Orthopedic','9874444444','Available');

INSERT INTO nurses(nurse_name,department) VALUES
('Nurse Latha','ICU'),
('Nurse Kavya','Emergency'),
('Nurse Meena','Surgery');

INSERT INTO staff(firstname,designation) VALUES
('Ramesh','Receptionist'),
('Suresh','Accountant'),
('Mahesh','Security');

INSERT INTO patients(patient_name,gender,age,doctor_id) VALUES
('Rahul','Male',25,1),
('Sneha','Female',30,2),
('Kiran','Male',40,3),
('Divya','Female',35,1),
('Arjun','Male',28,4);

INSERT INTO rooms(room_number,room_type,status,cost) VALUES
(101,'General','Available',500),
(102,'ICU','Occupied',2000),
(103,'Private','Available',1500),
(104,'General','Available',500),
(105,'ICU','Occupied',2000);

INSERT INTO bills(patient_id,amount,status) VALUES
(1,2000,'Paid'),
(2,3500,'Pending'),
(3,5000,'Paid'),
(4,1500,'Pending');

INSERT INTO appointments(patient_id,doctor_id,date) VALUES
(1,1,'2026-03-10'),
(2,2,'2026-03-11'),
(3,3,'2026-03-12'),
(4,1,'2026-03-13');

SELECT * FROM doctors;
SELECT * FROM patients;
SELECT doctor_name FROM doctors;
SELECT * FROM rooms WHERE status='Available';
SELECT * FROM rooms WHERE cost>1000;
SELECT * FROM patients WHERE age>30;
SELECT * FROM doctors WHERE availability='Available';
SELECT COUNT(*) FROM doctors;
SELECT COUNT(*) FROM patients;
SELECT AVG(age) FROM patients;
SELECT MAX(cost) FROM rooms;
SELECT MIN(cost) FROM rooms;
SELECT * FROM staff;
SELECT * FROM nurses;
SELECT * FROM bills WHERE status='Paid';
SELECT * FROM bills WHERE status='Pending';
SELECT * FROM appointments;
SELECT patient_name FROM patients WHERE gender='Female';
SELECT doctor_name FROM doctors WHERE specialization='Dentist';
SELECT room_number FROM rooms WHERE status='Available';

UPDATE doctors SET availability='Not Available' WHERE doctor_id=1;
UPDATE rooms SET status='Occupied' WHERE room_id=1;
UPDATE patients SET age=29 WHERE patient_id=5;
UPDATE bills SET status='Paid' WHERE bill_id=2;
UPDATE doctors SET phone='9999999999' WHERE doctor_id=2;
UPDATE staff SET designation='Manager' WHERE staff_id=1;
UPDATE nurses SET department='ICU' WHERE nurse_id=2;
UPDATE rooms SET cost=600 WHERE room_id=4;
UPDATE patients SET doctor_id=2 WHERE patient_id=1;
UPDATE appointments SET date='2026-03-15' WHERE appointment_id=1;

DELETE FROM staff WHERE staff_id=3;
DELETE FROM nurses WHERE nurse_id=3;
DELETE FROM patients WHERE patient_id=5;
DELETE FROM bills WHERE bill_id=4;
DELETE FROM appointments WHERE appointment_id=3;

SELECT patients.patient_name, doctors.doctor_name
FROM patients JOIN doctors
ON patients.doctor_id=doctors.doctor_id;

SELECT patients.patient_name, bills.amount
FROM patients JOIN bills
ON patients.patient_id=bills.patient_id;

SELECT doctors.doctor_name, appointments.date
FROM doctors JOIN appointments
ON doctors.doctor_id=appointments.doctor_id;

SELECT COUNT(*) FROM doctors WHERE availability='Available';
SELECT COUNT(*) FROM rooms WHERE status='Available';
SELECT SUM(amount) FROM bills;
SELECT doctor_id, COUNT(*) FROM patients GROUP BY doctor_id;
SELECT status, COUNT(*) FROM rooms GROUP BY status;
SELECT specialization, COUNT(*) FROM doctors GROUP BY specialization;
SELECT gender, COUNT(*) FROM patients GROUP BY gender;
SELECT AVG(amount) FROM bills;
SELECT MAX(age) FROM patients;
SELECT MIN(age) FROM patients;
SELECT COUNT(*) FROM appointments;

SELECT doctors.doctor_name, COUNT(patients.patient_id)
FROM doctors LEFT JOIN patients
ON doctors.doctor_id=patients.doctor_id
GROUP BY doctors.doctor_name;

SELECT patients.patient_name, appointments.date
FROM patients JOIN appointments
ON patients.patient_id=appointments.patient_id;

SELECT doctors.doctor_name, rooms.room_type
FROM doctors CROSS JOIN rooms;

SELECT * FROM doctors ORDER BY doctor_name;
SELECT * FROM patients ORDER BY age DESC;
SELECT * FROM rooms ORDER BY cost;
SELECT * FROM bills ORDER BY amount DESC;
SELECT DISTINCT specialization FROM doctors;
SELECT DISTINCT department FROM nurses;
SELECT COUNT(*) FROM patients;
SELECT COUNT(*) FROM rooms;
SELECT COUNT(*) FROM bills;
SELECT COUNT(*) FROM staff;
SELECT COUNT(*) FROM nurses;
SELECT COUNT(*) FROM doctors;
SELECT SUM(cost) FROM rooms;
SELECT AVG(cost) FROM rooms;
SELECT MAX(amount) FROM bills;
SELECT MIN(amount) FROM bills;
SELECT doctor_name FROM doctors WHERE doctor_id=3;
SELECT patient_name FROM patients WHERE patient_id=2;
SELECT room_type FROM rooms WHERE room_id=3;
SELECT specialization FROM doctors WHERE availability='Available';
SELECT patient_name FROM patients WHERE age<35;
SELECT * FROM rooms WHERE room_type='ICU';
SELECT * FROM doctors WHERE specialization='Cardiologist';
SELECT * FROM patients WHERE gender='Male';
SELECT * FROM staff WHERE designation='Receptionist';
SELECT * FROM nurses WHERE department='ICU';
SELECT COUNT(*) FROM patients WHERE gender='Female';
SELECT COUNT(*) FROM doctors WHERE specialization='Dentist';
SELECT COUNT(*) FROM rooms WHERE status='Occupied';
SELECT COUNT(*) FROM bills WHERE status='Paid';
SELECT COUNT(*) FROM appointments WHERE doctor_id=1;