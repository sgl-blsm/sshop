--创建数据表sshop_goods商品表
create table sshop_goods(
    goods_id mediumint unsigned not null  auto_increment comment '主键',
    goods_name varchar(256) not null comment '商品名称',
    goods_price decimal(10,2) not null default 0 comment '市场价格',
    goods_shop_price decimal(10,2) not null default 0 comment '本店价格',
    goods_number smallint not null default 1 comment '商品数量',
    goods_weight smallint not null default 0 comment '商品重量',
    cat_id mediumint not null default 0 comment '商品分类',
    brand_id mediumint not null default 0 comment '商品品牌',
    goods_big_logo char(100) not null default '' comment '商品大图片',
    goods_small_logo char(100) not null default '' comment '商品缩略图',
    goods_introduce text comment '商品介绍',
    is_sale enum('上架','下架') not null default '上架' comment '上架，下架',
    is_rec enum('推荐','不推荐') not null default '不推荐' comment '推荐与否',
    is_hot enum('热销','不热销') not null default '不热销' comment '热销与否',
    is_new enum('新品','不新品') not null default '不新品' comment '新品与否',
    create_time int not null comment '添加信息时间',
    update_time int not null comment '修改信息时间',
    is_del enum('删除','不删除') not null default '不删除' comment '删除与否',
    primary key (goods_id),
    key (goods_shop_price),
    key (goods_price),
    key (cat_id),
    key (brand_id),
    key (create_time)
)engine=Innodb charset=utf8;

