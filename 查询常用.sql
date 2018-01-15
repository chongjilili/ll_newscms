SELECT a.ll_aid,a.ll_title,FROM_UNIXTIME(a.ll_time),a.ll_rnum,u.ll_username,c.ll_catname FROM ll_acticle as a
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid LIMIT 0,10;

SELECT count(*) FROM ll_acticle as a
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid;

SELECT * FROM ll_acticle as a
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid WHERE a.ll_aid = 1;

SELECT cm.* , a.ll_title ,u.ll_username FROM ll_comments as cm LEFT JOIN ll_user as u ON cm.ll_uid = u.ll_uid LEFT JOIN ll_acticle as a ON cm.ll_aid ;


SELECT cm.* , a.ll_title ,u.ll_username FROM ll_comments as cm LEFT JOIN ll_user as u ON cm.ll_uid = u.ll_uid LEFT JOIN ll_acticle as a ON cm.ll_aid  WHERE cm.ll_cmtid = 1;

SELECT co.* , a.ll_title ,u.ll_username FROM ll_collect as co LEFT JOIN ll_user as u ON co.ll_uid = u.ll_uid LEFT JOIN ll_acticle as a ON co.ll_aid ;


SELECT a.*,FROM_UNIXTIME(a.ll_time) as ll_time ,(unix_timestamp(now())-a.ll_time) AS passtime ,   u.ll_username,c.ll_catname, COUNT( DISTINCT cm.ll_comments) as commentnum FROM ll_article as a
LEFT JOIN ll_user as u ON a.ll_uid = u.ll_uid
LEFT JOIN ll_category as c ON a.ll_cid = c.ll_cid
LEFT JOIN ll_comments as cm ON cm.ll_aid = a.ll_aid   GROUP BY a.ll_aid  ;



SELECT cm.* , a.ll_title ,u.ll_username FROM ll_comments as cm
LEFT JOIN ll_user as u ON cm.ll_uid = u.ll_uid
LEFT JOIN ll_article as a ON cm.ll_aid  = a.ll_aid WHERE a.ll_aid = 1;




SELECT u.ll_uid,u.ll_username,ut.* FROM ll_user as u LEFT JOIN ll_usertype AS ut ON u.ll_type = ut.ll_type ;




SELECT ap.* , u.ll_username ,ut.ll_typename FROM ll_apply as ap LEFT JOIN ll_user as u ON ap.ll_uid = u.ll_uid LEFT JOIN ll_usertype as ut ON ap.ll_type = ut.ll_type


SELECT count(*) as count  FROM ll_apply as ap
LEFT JOIN ll_user as u ON ap.ll_uid = u.ll_uid
LEFT JOIN ll_usertype as ut ON ap.ll_type = ut.ll_type







