CREATE TABLE Usuario (
	id int NOT NULL IDENTITY,
	nome varchar(200) NOT NULL,
	email varchar(200) NOT NULL,
	senha varchar(200) NOT NULL,
	ativo bit NOT NULL DEFAULT(0),
	
	CONSTRAINT PK_Usuario PRIMARY KEY (id),
	CONSTRAINT UC_Email UNIQUE (email)
)

GO


CREATE TABLE Cliente (
	id int NOT NULL IDENTITY,
	nome varchar(200) NOT NULL,
	cpf varchar(15) NOT NULL,
	rg varchar(20),
	dataCadastro datetime NOT NULL DEFAULT(GETDATE()),
	dataAtualizacao datetime,
	idUser int not null,
	idUserMod int,
	dataNascimento date NOT NULL,
	localNascimento varchar(5) NOT NULL, 
	telefone varchar(30) NOT NULL,
	
	CONSTRAINT FK_Cliente PRIMARY KEY (id),
	
	CONSTRAINT FK_UsuarioCriacao FOREIGN KEY (idUser)
	REFERENCES Usuario(id),
	
	CONSTRAINT FK_UsuarioModificacao FOREIGN KEY (idUserMod)
	REFERENCES Usuario(id)
)
