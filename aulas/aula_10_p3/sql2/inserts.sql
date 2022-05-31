USE codeeasy_gerenciador_de_lojas;

INSERT INTO lojas (nome, telefone, endereco) 
VALUES ('EIPRO Tecnologia', '(12)3207-9133', 'Av. Dr. Nelson d\'Ávila, 1837');

INSERT INTO lojas (nome, telefone, endereco) 
VALUES ('Continuum TI', '(11)97315-0491', 'R. Itaguaçu, 170');

INSERT INTO lojas (nome, telefone, endereco) 
VALUES ('Digi Office Informatica', '(31)99908-1436', 'R. da Bahia, 1176');

INSERT INTO lojas (nome, telefone, endereco) 
VALUES ('Infocentric Informatica', '(21)97467-7480', 'R. Cap. Cruz, 714');

INSERT INTO lojas (nome, telefone, endereco) 
VALUES ('bitti - Soluções em TI', '(51)3664-3225', 'Av. Silva Jardim, 227');

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (1, 'teclado', 42.70, 10);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (1, 'mouse', 32.10, 15);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (1, 'cd-r gravável', 3.70, 35);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (1, 'mouse pad', 18.65, 12);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (2, 'pen-drive', 5.40, 60);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (2, 'dvd-r gravável', 3.70, 35);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (3, 'cd-r gravável', 3.70, 50);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (3, 'dvd-r gravável', 5.40, 10);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (3, 'pen-drive', 58.35, 5);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (4, 'mouse pad', 18.65, 10);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (4, 'teclado', 42.70, 8);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (5, 'mouse', 32.10, 10);

INSERT INTO produtos (loja_id, nome, preco, quantidade) 
VALUES (5, 'dvd-r gravável', 5.40, 40);