-- Création de la base de données
CREATE DATABASE IF NOT EXISTS thumbflow_db;
USE thumbflow_db;

-- Table des utilisateurs
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    is_admin BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des posts
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des commentaires
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_approved BOOLEAN DEFAULT FALSE,
    user_id INT NOT NULL,
    post_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE
);

-- Insertion d'un utilisateur administrateur par défaut
-- Nom d'utilisateur: admin, Mot de passe: admin123
INSERT INTO users (username, email, password, is_admin) 
VALUES ('admin', 'admin@thumbflow.com', '$2y$10$8MNjTMxz3LVEj.UZv5vO3.YGBwwXCHYLlQwuBpEZpzQx5kBtacIJe', 1);

-- Insertion d'un utilisateur standard par défaut
-- Nom d'utilisateur: user, Mot de passe: user123
INSERT INTO users (username, email, password, is_admin) 
VALUES ('user', 'user@thumbflow.com', '$2y$10$8MNjTMxz3LVEj.UZv5vO3.YGBwwXCHYLlQwuBpEZpzQx5kBtacIJe', 0);

-- Insertion de quelques posts d'exemple
INSERT INTO posts (title, content, user_id) 
VALUES ('Bienvenue sur Thumbflow', 'Ceci est le premier post de notre plateforme. Nous sommes ravis de vous accueillir sur Thumbflow, une plateforme moderne pour partager vos idées et interagir avec la communauté.', 1);

INSERT INTO posts (title, content, user_id) 
VALUES ('Comment utiliser Thumbflow', 'Thumbflow est une plateforme simple et intuitive. Vous pouvez créer des posts, commenter les publications des autres utilisateurs, et gérer votre profil. Les administrateurs peuvent modérer les commentaires et gérer les utilisateurs.', 1);

INSERT INTO posts (title, content, user_id) 
VALUES ('Mon premier post', 'Bonjour à tous ! Je suis ravi de rejoindre la communauté Thumbflow. J\'espère pouvoir partager de nombreuses idées intéressantes avec vous tous.', 2);

-- Insertion de quelques commentaires d'exemple
INSERT INTO comments (content, is_approved, user_id, post_id) 
VALUES ('Super initiative ! J\'ai hâte de voir l\'évolution de la plateforme.', 1, 2, 1);

INSERT INTO comments (content, is_approved, user_id, post_id) 
VALUES ('Merci pour ces explications claires et concises.', 1, 2, 2);

INSERT INTO comments (content, is_approved, user_id, post_id) 
VALUES ('Bienvenue parmi nous !', 1, 1, 3);

INSERT INTO comments (content, is_approved, user_id, post_id) 
VALUES ('Est-ce que vous prévoyez d\'ajouter d\'autres fonctionnalités bientôt ?', 0, 2, 1);
