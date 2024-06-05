CREATE TABLE comments_ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL, -- ID del usuario que realiza el comentario/valoración
    product_id INT NOT NULL, -- ID del producto o servicio al que se refiere el comentario/valoración
    comment TEXT, -- Texto del comentario
    rating INT, -- Valoración del producto (de 1 a 5 estrellas, por ejemplo)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, -- Fecha y hora de creación del comentario/valoración
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP -- Fecha y hora de última actualización
);