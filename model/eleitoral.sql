CREATE DATABASE Eleitoral;

USE Eleitoral;

CREATE TABLE Partido(numLegenda INT, 
siglaPart VARCHAR(20) NOT NULL, 
nomePart VARCHAR(50) NOT NULL, 
PRIMARY KEY (numLegenda));

CREATE TABLE Candidato(candidatoID INT, 
nomeCand VARCHAR(25) NOT NULL, 
totalVotos INT NOT NULL DEFAULT 0, 
partidoID INT NOT NULL DEFAULT 0, 
passwordCand VARCHAR(8) NOT NULL, 
PRIMARY KEY (candidatoID), 
FOREIGN KEY(partidoID) REFERENCES Partido(numLegenda));

INSERT INTO Partido VALUES (10, 'REPUBLICANOS', 'Republicanos');
INSERT INTO Partido VALUES (11, 'PP', 'Progressistas');
INSERT INTO Partido VALUES (12, 'PDT', 'Partido Democratico Trabalhista');
INSERT INTO Partido VALUES (13, 'PT', 'Partido dos Trabalhadores');
INSERT INTO Partido VALUES (14, 'PTB', 'Partido Trabalhista Brasileiro');
INSERT INTO Partido VALUES (15, 'MDB', 'Movimento Democratico Brasileiro');
INSERT INTO Partido VALUES (16, 'PSTU', 'Partido Socialista dos Trabalhadores Unificados');
INSERT INTO Partido VALUES (17, 'PSL', 'Partido Social Liberal');
INSERT INTO Partido VALUES (18, 'REDE', 'Rede Sustentabilidade');
INSERT INTO Partido VALUES (19, 'PODE', 'Podemos');
INSERT INTO Partido VALUES (20, 'PSC', 'Partido Social Cristao');
INSERT INTO Partido VALUES (21, 'PCB', 'Partido Comunista Brasileiro');
INSERT INTO Partido VALUES (22, 'PL', 'Partido Liberal');
INSERT INTO Partido VALUES (23, 'CIDADANIA', 'Cidadania');
INSERT INTO Partido VALUES (25, 'DEM', 'Democratas');
INSERT INTO Partido VALUES (27, 'DC', 'Democracia Crista');
INSERT INTO Partido VALUES (28, 'PRTB', 'Partido Renovador Trabalhista Brasileiro');
INSERT INTO Partido VALUES (29, 'PCO', 'Partido Causa Operaria');
INSERT INTO Partido VALUES (30, 'NOVO', 'Novo');
INSERT INTO Partido VALUES (33, 'PMN', 'Partido Mobilizacao Crista');
INSERT INTO Partido VALUES (35, 'PMB', 'Partido Mulher Brasileira');
INSERT INTO Partido VALUES (36, 'PTC', 'Partido Trabalhista Cristao');
INSERT INTO Partido VALUES (40, 'PSB', 'Partido Socialista Brasileiro');
INSERT INTO Partido VALUES (43, 'PV', 'Partido Verde');
INSERT INTO Partido VALUES (45, 'PSDB', 'Partido Social Democrata Brasileiro');
INSERT INTO Partido VALUES (50, 'PSOL', 'Partido Socialismo e Liberdade');
INSERT INTO Partido VALUES (51, 'PATRIOTA', 'Patriota');
INSERT INTO Partido VALUES (55, 'PSD', 'Partido Social Democratico');
INSERT INTO Partido VALUES (65, 'PCdoB', 'Partido Comunista do Brasil');
INSERT INTO Partido VALUES (70, 'AVANTE', 'Avante');
INSERT INTO Partido VALUES (77, 'SOLIDARIEDADE', 'Solidariedade');
INSERT INTO Partido VALUES (80, 'UP', 'UP Unidade Popular');
INSERT INTO Partido VALUES (90, 'PROS', 'Partido Republicano da Ordem Social');
