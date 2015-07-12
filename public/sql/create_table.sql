create table cliente (
	id int not null primary key,
	nome varchar(45) not null,
	sobrenome varchar(45) not null,
	senha varchar(15) not null,
	cpf varchar(15) not null,
	telefone varchar(20) null,
	email varchar(45) not null,
	endereco varchar(150) not null,
	bairro varchar(100) not null,
	cidade varchar(100) not null,
	estado varchar(2) not null
);

create table marca (
	id int not null primary key,
	nome varchar(45) not null
);

create table produto (
	id int not null primary key,
	marca_id integer not null,
	nome varchar(45) not null,
	descricao varchar (150) not null,
	url_foto varchar(200) not null,
	quantidade integer not null,
	peso double precision not null,  
	preco double precision not null,
	constraint mar_fk foreign key (marca_id)
	references marca (id)
);

create table venda (
	id int not null primary key,
	cliente_id integer not null,
	produto_id integer not null,
	data_venda date not null,
	quantidade integer not null,
	constraint cli_fk foreign key (cliente_id)
	references cliente(id),
	constraint pro_fk foreign key (produto_id)
	references produto(id)
);