
CREATE TABLE IF NOT EXISTS `descuentos` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `productId` INT NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `description` TEXT NOT NULL,
  `percentage` DECIMAL(5,2) NOT NULL,
  `fechaInicio` DATE NOT NULL,
  `fechaFin` DATE NOT NULL,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `createdBy` INT NOT NULL,
  `updatedAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedBy` INT NOT NULL,
  `status` BOOLEAN NOT NULL DEFAULT 1,
  FOREIGN KEY (`productId`) REFERENCES `productos`(`id_producto`),
  FOREIGN KEY (`createdBy`) REFERENCES `users`(`id`),
  FOREIGN KEY (`updatedBy`) REFERENCES `users`(`id`)
);

UPDATE
  descuentos
SET 
-- all
  productId = 1,
  name = 'Descuento de prueba',
  description = 'Descuento de prueba',
  percentage = 10.00,
  fechaInicio = '2021-01-01',
  fechaFin = '2021-12-31',
  updatedBy = 1
WHERE
  id = 1;
