INSERT INTO `concesionario`.`coches`
(`Matricula`, `Modelo`, `Marca`, `Año`, `Km`, `Combustible`, `Caballos`, `TipoMarchas`, `Precio`, `Imagen`)
VALUES
('5586 TRE', 'Golf', 'Volkswagen', '2022', '13.051 KM', 'Gasolina', '130 CV', 'Manual', '25.990 €', 'fotos/golf.jpg'),
('4695 PLI', 'TT Coupe', 'Audi', '2015', '100.199 KM', 'Gasolina', '230 CV', 'Automatico', '25.990 €', 'fotos/tt.jpg'),
('4570 BYT','Qashqai','Nissan','2019','49.323 KM','Diesel','115 CV','Manual','18.990 €','fotos/qashqai.jpg'),
('5961 AOH','Megane','Renault','2019','72.857 KM','Diesel','115 CV','Manual','15.590 €','fotos/megane.jpg'),
('5768 HFE','Clase C','Mercedes','2018','83.956 KM','Diesel','170 CV','Automatico','25.690 €','fotos/clasec.jpg'),
('1058 TPG','Mondeo','Ford','2018','104.119 KM','Diesel','150 CV','Manual','14.990€','fotos/mondeo.jpg'),
('1234 VFT','Arona','Seat','2022','17.705 KM','Gasolina','110 CV','Automatico','20.099 €','fotos/arona.jpg'),
('4756 WSD', 'Levante', 'Maserati', '2022', '18.536 KM', 'Gasolina', '350 CV', 'Automatico', '80.590 €', 'fotos/levante.jpg');
SELECT * FROM concesionario.coches;