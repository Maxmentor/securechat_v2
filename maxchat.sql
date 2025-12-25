
-- Rooms table
CREATE TABLE IF NOT EXISTS rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_code VARCHAR(50) UNIQUE NOT NULL,
    room_pass VARCHAR(50) NOT NULL
);

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    display_name VARCHAR(50) NOT NULL,
    room_code VARCHAR(50) NOT NULL
);

-- Messages table
CREATE TABLE IF NOT EXISTS messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_code VARCHAR(50) NOT NULL,
    sender VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    file VARCHAR(255) DEFAULT NULL,
    visible_to TEXT DEFAULT NULL
);
