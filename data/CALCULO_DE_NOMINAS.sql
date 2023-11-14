create database CALCULO_DE_NOMINAS

create table USER_TYPE(
    code int auto_increment primary key,
    name varchar(20) not null
)

create table USER(
    code int auto_increment primary key,
    email varchar(100) not null,
    password varchar(100),
    creationDate date,
    userType int not null,
    foreign key(userType) references USER_TYPE(code)
)

create table ENTERPRISE(
    code int auto_increment primary key,
    name varchar(100) not null,
    fiscalName varchar(100) not null,
    RFC char(12) not null,
    addressDesc varchar(100) not null,
    CP char(5) not null,
    city varchar(50),
    state varchar(50),
    user int,
    foreign key(user) references USER(code)
)

create table WORKER(
    code int auto_increment primary key,
    name varchar(50) not null,
    lastName varchar(30) not null,
    lastName2 varchar(30) not null,
    RFC char(13) not null,
    NSS char(11) not null,
    CURP char(18) not null,
    number char(12) not null,
    entryDate date not null,
    enterprise int not null,
    user int not null,
    foreign key(enterprise) references ENTERPRISE(code),
    foreign key(user) references USER(code)
)

create table PROFILE(
    code int auto_increment primary key,
    name varchar(30) not null,
    description varchar(200),
    enterprise int,
    foreign key(enterprise) references ENTERPRISE(code)
)

create table SALARY(
    code int auto_increment primary key,
    hours time,
    payDate date,
    total float,
    period varchar(50) not null,
    worker int,
    enterprise int,
    profile int,
    foreign key(worker) references WORKER(code),
    foreign key(enterprise) references ENTERPRISE(code),
    foreign key(profile) references PROFILE(code)
)

create table INCOMES (
    code int auto_increment primary key,
    name varchar(30) not null,
    description varchar(100) not null,
    enterprise int,
    foreign key(enterprise) references ENTERPRISE(code)
)

create table BENEFITS (
    code int auto_increment primary key,
    name varchar(30) not null,
    description varchar(100) not null,
    enterprise int,
    foreign key(enterprise) references ENTERPRISE(code)
)

create table DEDUCTION (
    code int auto_increment primary key,
    name varchar(30) not null,
    description varchar(100) not null
)

create table SALARY_INCOMES(
    incomes int,
    salary int,
    total float not null,
    foreign key(incomes) references INCOMES(code),
    foreign key(salary) references SALARY(code)
)

create table SALARY_BENEFITS(
    benefits int,
    salary int,
    total float not null,
    foreign key(benefits) references BENEFITS(code),
    foreign key(salary) references SALARY(code)
)


create table SALARY_DEDUCTIONS(
    deduction int,
    salary int,
    total float not null,
    foreign key(deduction) references DEDUCTION(code),
    foreign key(salary) references SALARY(code)
)



create table PROFILE_INCOMES(
    incomes int,
    profile int,
    status bool not null,
    foreign key(incomes) references INCOMES(code),
    foreign key(profile) references PROFILE(code)
)

create table PROFILE_BENEFITS(
    benefits int,
    profile int,
    status bool not null,
    foreign key(benefits) references BENEFITS(code),
    foreign key(profile) references PROFILE(code)
)


create table PROFILE_DEDUCTIONS(
    deduction int,
    profile int,
    status bool not null,
    foreign key(deduction) references DEDUCTION(code),
    foreign key(profile) references PROFILE(code)
)

