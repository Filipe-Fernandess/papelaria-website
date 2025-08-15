create database if not exists lara_site;

use lara_site;

create table if not exists usuario (
	id int auto_increment primary key unique,
    cpf varchar (14) unique not null,
    nome varchar (100) not null,
    sobrenome varchar (100),
    email varchar (255) not null unique,
    senha varchar (255) not null,
    is_admin boolean default false, 
    telefone char (20)
);

create table if not exists endereco (
	id_endereco int auto_increment primary key unique,
    usuario_id int,
    rua varchar (100) not null,
    num int not null,
    estado char (2) not null,
    cidade varchar (45) not null,
    cep varchar (12) not null,
    referencia varchar (200),
    foreign key (usuario_id) references usuario(id)
);

create table if not exists pagamento (
	id_pagamento int auto_increment primary key unique,
    usuario_id int,
    ultimos_digitos varchar(4),
    token_cartao varchar (255) unique not null,
    bandeira enum ("Mastercard", "Visa", "Elo", "Hipercard", "American Express") not null,
    validade date not null,
    banco varchar (100) not null,
    nome_proprietario varchar (100) not null,
    foreign key (usuario_id) references usuario(id)
);
create table if not exists produtos (
	id_produto int auto_increment primary key unique,
    nome varchar (100) not null,
    descricao longtext,
    categoria varchar (50) not null,
    preco_atual decimal (10,2) not null,
    preco_antigo decimal (10,2) not null,
    imagem_1 varchar (255) not null,
    imagem_2 varchar (255) not null,
    imagem_3 varchar (255) not null,
    imagem_4 varchar (255),
    imagem_5 varchar (255),
    imagem_6 varchar (255),
    quantidade int not null,
    ativo boolean default"true",
    percentual_desconto int
);
create table if not exists carrinho (
	id_carrinho int auto_increment primary key unique,
    usuario_id int,
    produto_id int,
    quantidade int not null default 1,
    data_adicao datetime default current_timestamp(),
    foreign key (usuario_id) references usuario (id),
    foreign key (produto_id) references produtos (id_produto)
);

create table if not exists pedidos (
	id_pedido int auto_increment primary key unique,
    preco_total decimal(10,2),
    status enum ("Pagamento pendente", "Pago", "Preparando", "A Caminho", "Entregue") default "Pagamento pendente",
    data_pedido datetime default current_timestamp(),
    foreign key (id_pedido) references produtos (id_produto)
);

create table if not exists itens_pedido (
	id_item int auto_increment primary key unique,
    pedido_id int,
    produto_id int,
    quantidade int,
    preco_total decimal (10,2),
    foreign key (pedido_id) references pedidos (id_pedido),
    foreign key (produto_id) references produtos (id_produto)
);

create table if not exists banners (
	id_banner int auto_increment primary key unique,
    produto_id int,
    image varchar (255) not null,
    descricao varchar (100),
    link varchar (255),
    ordem int not null,
    foreign key (produto_id) references produtos (id_produto)
);

create table if not exists cupons (
	id_cupom int auto_increment primary key unique,
    codigo varchar(50) not null unique,
	descricao varchar (255) not null,
    desconto float not null,
    valor_minimo decimal (10,2),
    ativo boolean
);