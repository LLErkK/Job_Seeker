CREATE DATABASE job_portal;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('job_seeker', 'admin', 'employer') NOT NULL
);

CREATE TABLE profile (
    profile_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    name VARCHAR(100) DEFAULT NULL,
    umur INT,
    gender ENUM('male', 'female', 'other') NOT NULL, -- assuming gender options
    alamat TEXT,
    riwayat_pendidikan TEXT,
    riwayat_pekerjaan TEXT,
    deskripsi TEXT,
    photo VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE jobs (
    id INT PRIMARY KEY AUTO_INCREMENT,
    employer_id INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    job_type ENUM('intern', 'full-time') NOT NULL,
    status ENUM('Open', 'Closed') NOT NULL,
    requirements TEXT,
    salary DOUBLE(10,2),
    location TEXT,
    deadline DATE,
    company_name VARCHAR(100), -- assumed max length for company name
    FOREIGN KEY (employer_id) REFERENCES users(id) ON DELETE CASCADE, 
    FOREIGN KEY (company_name) REFERENCES users(username) ON DELETE CASCADE
);

CREATE TABLE job_applications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    job_id INT NOT NULL,
    user_id INT NOT NULL,
    application_date DATE,
    status ENUM('pending', 'accepted', 'rejected') DEFAULT 'pending',
    FOREIGN KEY (job_id) REFERENCES jobs(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
