CREATE DATABASE work;
USE work;
SELECT database();
CREATE TABLE Departments (
  Code INTEGER PRIMARY KEY,
  Name varchar(255) NOT NULL ,
  Budget decimal NOT NULL 
);

CREATE TABLE Employees (
  SSN INTEGER PRIMARY KEY,
  Name varchar(255) NOT NULL ,
  LastName varchar(255) NOT NULL ,
  Department INTEGER NOT NULL , 
  foreign key (department) references Departments(Code) 
);

INSERT INTO Departments(Code,Name,Budget) VALUES(14,'IT',65000);
INSERT INTO Departments(Code,Name,Budget) VALUES(37,'Accounting',15000);
INSERT INTO Departments(Code,Name,Budget) VALUES(59,'Human Resources',240000);
INSERT INTO Departments(Code,Name,Budget) VALUES(77,'Research',55000);

INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('123234877','Michael','Rogers',14);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('152934485','Anand','Manikutty',14);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('222364883','Carol','Smith',37);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('326587417','Joe','Stevens',37);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('332154719','Mary-Anne','Foster',14);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('332569843','George','ODonnell',77);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('546523478','John','Doe',59);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('631231482','David','Smith',77);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('654873219','Zacary','Efron',59);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('745685214','Eric','Goldsmith',59);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('845657245','Elizabeth','Doe',14);
INSERT INTO Employees(SSN,Name,LastName,Department) VALUES('845657246','Kumar','Swamy',14);

-- 2.1 Sélectionnez le nom de famille de tous les employés.
SELECT LastName FROM Employees;

-- 2.2 Sélectionnez le nom de famille de tous les employés, sans doublons.
SELECT DISTINCT LastName FROM Employees;

-- 2.3 Sélectionnez toutes les données des employés dont le nom de famille est "Smith".
SELECT * FROM Employees where LastName = 'Smith';

-- 2.4 Sélectionnez toutes les données des employés dont le nom de famille est "Smith" ou "Doe".
SELECT * FROM Employees where LastName = 'Smith' OR LastName = 'Doe';

-- 2.5 Sélectionnez toutes les données des employés qui travaillent dans le département 14.
SELECT * FROM Employees where Department = 14;

-- 2.6 Sélectionner toutes les données des employés qui travaillent dans le département 37 ou le département 77.
SELECT * FROM Employees where Department = 37 OR Department = 77 ;

-- 2.7 Sélectionner toutes les données des employés dont le nom de famille commence par un "S".
SELECT * FROM Employees where LastName like 'S%';

-- 2.8 Sélectionner la somme des budgets de tous les départements.
SELECT SUM(Budget) FROM Departments;

-- 2.9 Sélectionnez le nombre d'employés dans chaque département (vous devez seulement indiquer le code du département et le nombre d'employés).
SELECT Departments.Code, COUNT(*) 
	FROM Employees
    JOIN Departments
    ON Departments.Code = Employees.Department
    GROUP BY Department;

-- 2.10 Sélectionnez toutes les données des employés, y compris les données du département de chaque employé.
SELECT * 
	FROM Employees
    JOIN Departments
    ON Departments.Code = Employees.Department;
    
-- 2.11 Sélectionnez le nom et le prénom de chaque employé, ainsi que le nom et le budget du département de l'employé.
SELECT Employees.LastName, Employees.Name,  Departments.Name, Departments.Budget
	FROM Employees
    JOIN Departments
    ON Departments.Code = Employees.Department;
    
-- 2.12 Sélectionnez le nom et le nom de famille des employés travaillant pour des ministères dont le budget est supérieur à 60 000 $.
SELECT Employees.LastName, Employees.Name, Departments.Budget
	FROM Employees
    JOIN Departments
    ON Departments.Code = Employees.Department AND Departments.Budget > 60000;
    
-- 2.13 Sélectionnez les départements dont le budget est supérieur au budget moyen de l'ensemble des départements.
SELECT * FROM Departments where Budget > ( SELECT AVG(Budget) FROM Departments);

-- 2.14 Sélectionnez les noms des départements ayant plus de deux employés.
SELECT Departments.Name
	FROM Employees
    JOIN Departments
    ON Departments.Code = Employees.Department 
    group by Departments.Code ;
	