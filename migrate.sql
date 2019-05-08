drop table if exists User;
drop table if exists lang;
drop table if exists `likes`;
drop table if exists blog;
drop table if exists article;


create table article (
  id integer auto_increment primary key,
  user_name integer not null,
  title varchar(63) character set utf8mb4 not null,
  text TEXT(65535) character set utf8mb4 not null,
  created datetime not null default current_timestamp,
  updated datetime not null default current_timestamp on update current_timestamp,
  CONSTRAINT fk_article_user_id
    FOREIGN KEY (user_id)
    REFERENCES User (id)
    ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT fk_article_blog_id
    FOREIGN KEY (blog_id)
    REFERENCES blog (id)
    ON DELETE RESTRICT ON UPDATE RESTRICT
);

