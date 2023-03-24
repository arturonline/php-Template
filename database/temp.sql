create table categories
(
    category_id          INTEGER
        primary key,
    category_name        TEXT not null,
    category_description TEXT not null
);

create table tags
(
    tag_id          INTEGER
        primary key,
    tag_name        TEXT not null,
    tag_description TEXT not null
);

create table users
(
    user_id    INTEGER
        primary key,
    user_name  TEXT not null,
    user_hash  TEXT,
    user_email TEXT
);

create table posts
(
    post_id          INTEGER
        primary key,
    post_title       TEXT    not null,
    post_description TEXT    not null,
    post_body        TEXT    not null,
    creation_date    TEXT,
    update_date      TEXT,
    user_id          INTEGER not null
        references users
            on update cascade on delete cascade
);

create table post_categories
(
    post_id     INT not null
        references posts,
    category_id INT not null
        references categories,
    primary key (post_id, category_id)
);

create table post_tags
(
    post_id INTEGER not null
        references posts,
    tag_id  INTEGER not null
        references tags,
    primary key (post_id, tag_id)
);

