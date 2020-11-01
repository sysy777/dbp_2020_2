# 개발 환경 소개
- (백엔드)서버 사이드 언어 : PHP
- (프론트엔드)클라이언트 사이드 언어 : HTML
- 웹 서버 : 리눅스와 Apache Web server
> 선택이유
<br>리눅스는 오픈 소스이기 때문에 따로 비용을 지불 할 필요가 없다. 따라서 프로젝트가 단기성 프로젝트로 끝나는게 아니라 지속적인 개발로 이루어졌을 때 추가적인 비용을 들이지 않아도 된다. 
<br>리눅스는 서버 시스템으로 사용하기 위한 최소한의 설정으로 설치를 했을 경우 하드 디스크를 차지하는 전체 운영체제의 용량이 윈도우에 비해 상대적으로 적고, 요구하는 하드디스크의 성능도 높지 않다. 그래서 저사양, 혹은 구형의 컴퓨터에서도 서버 시스템의 운영이 가능하다.
<br>또한, 아파치 웹 서버는 유닉스 기반으로 만든 최초의 웹 서버 프로그램인 NCSA HTTPd를 기반으로 만들어졌으며, NCSA HTTPd를 리눅스에서도 돌리는 것을 목표로 만들어진 프로그램이다. 따라서 본래의 목적에 맞게 윈도우보다는 리눅스에서 지원이 더 잘 된다.

- 데이터베이스 : MariaDB
> 선택이유
<br>MariaDB는 MySQL보다 가볍고 빠르다. 그러면서도 MySQL에 대해 뛰어난 호환성을 가지고 있기때문에 MySQL처럼 쉽게 사용이 가능하다.
<br>MariaDB는 리눅스처럼 오픈소스이기 때문에 뛰어난 확장성을 가지고 있으며 소스코드의 개선이 자주 이루어지므로 안정성이 높다. 그리고 리눅스와 마찬가지로 별도의 비용을 지불 할 필요도 없다.


# 사용한 샘플 데이터 베이스
MySQL의 Sakila 샘플 데이터


# 사용된 테이블과 속성
- The film Table
<br>매장에 재고가 있을 수 있는 영화 목록 
<br>(film_id 필름식별아이디/ title 영화제목/ description 영화설명/ release_year 영화개봉연도/ language_id 영화언어식별외래키/ original_language_id 영화원래언어식별(더빙했을경우)/ rental_rate 영화대여비용/ rental_duration 대여기간/ length 영화길이(분)/ replacement cost 필름파손,분실배상액/ rating 영화등급/ special_features DVD특수기능/ last_update 컬럼생성 혹은 업데이트시기)

- The film_category Table
<br>영화와 카테고리
<br>(film_id 영화식별외래키/ category_id 카테고리식별외래키/ last_update 컬럼생성 혹은 업데이트시기)

- The category Table
<br>필름 범주 
<br>(category_id 범주식별아이디/ name 범주이름/ last_update 컬럼생성 혹은 업데이트시기)

- The rental Table
<br> 대여 정보
<br>(rental_id 대여식별아이디/ rental_date 대여날짜/ inventory_id 대여항목/ customer_id 대여고객/ return_date 반납날짜/ staff_id 대여직원/ last_update 컬럼생성 혹은 업데이트시기)

- The inventory Table
<br> 대여 품목 보관 정보
<br>(inventory_id 보관식별아이디/ film_id 필름식별아이디/ store_id 보관상점식별아이디/ last_update 컬럼생성 혹은 업데이트시기)

# 발견한 정보 3개
DVD를 사용자의 기호에 맞게 DVD를 분류하여 보여주는 웹사이트를 제작.
<br>각 분류항목을 선택한 후, 추가적으로 (제목 오름차순, 상영시간순, 대여 많은순) 중 원하는 방식으로 정렬을 할 수 있도록 하여 웹사이트를 이용하는 사용자의 상황에서 적절한 DVD를 찾을 수 있도록 하였음.
<br><br>분류 목록
<br>1) 영화 상영시간 별 분류 (1시간 단위)
<br>2) 카테고리 별 분류
<br>3) 관람 등급 별 분류 (미국 영상물 관람등급 기준)

# 동작 화면 소개 영상
