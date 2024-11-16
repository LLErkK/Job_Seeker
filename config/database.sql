CREATE DATABASE job_portal;
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('Job Seeker', 'Admin', 'Employer') NOT NULL
);
CREATE TABLE profile (
    profile_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    name VARCHAR(100) DEFAULT NULL,
    umur INT,
    gender ENUM,
    alamat TEXT,
    riwayat_pendidikan TEXT,
    riwayat_pekerjaan TEXT,
    deskripsi TEXT,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
CREATE TABLE Job (
    job_id INT PRIMARY KEY AUTO_INCREMENT,
    employer_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    job_type ENUM('Intern', 'Full-Time') NOT NULL,
    status ENUM('Open', 'Closed') NOT NULL,
    requirments TEXT,
    salary DOUBLE(10,2),
    location TEXT,
    deadline DATE,
    company_name VARCHAR,
    FOREIGN KEY (employer_id) REFERENCES users(user_id)
    FOREIGN KEY (company_name) REFERENCES users(username)
);





CREATE TABLE Application (
    application_id INT PRIMARY KEY AUTO_INCREMENT,
    job_id INT NOT NULL,
    user_id INT NOT NULL,
    application_date DATE,
    status ENUM('Pending', 'Accepted', 'Rejected') DEFAULT 'Pending',
    FOREIGN KEY (job_id) REFERENCES Job(job_id),
    FOREIGN KEY (user_id) REFERENCES User(user_id)
);
