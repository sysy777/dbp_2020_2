<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title> DVD 분류 시스템 </title>
    <style>
		body{
			font-family: Consolas, monospace;
			font-family: 12px;
		}
		.top{
			color: #F08080;
            line-height: 1.5;
		}
        .blank_title{
            line-height: 1.5;
        }
	</style>
</head>

<body>
    <h1 class="top"> DVD 분류 시스템 </h1>
    <h3>원하시는 DVD의 특징을 선택하세요</h3>
    <form action="length.php" method="GET" class="blank_title">
       영화 상영시간 별</br>
        <TT>분류방법</TT> <br>
        <select type="text" name="length">
            <option value="60"> ~ 1시간</option>
            <option value="90">1시간 ~ 1시간30분 </option>
            <option value="120">1시간30분 ~ 2시간</option>
            <option value="150">2시간 ~ 2시간30분</option>
            <option value="180">2시간30분 ~ 3시간</option>
            <option value="181">3시간 ~ </option>
        </select><br><TT>정렬방법</TT><br>
        <select type="text" name="order">
            <option value="title">제목 오름차순</option>
            <option value="time">시간 적은순</option>
            <option value="last_update">대여 많은순(동일할경우 상영시간 적은순/ 제목 오름차순)</option>
        </select><br>
        <input type="submit" value="Search">
    </form>
    <form action="category.php" method="GET" class="blank_title">
    <br>영화 카테고리 별<br><TT>분류방법</TT><br>
        <select type="text" name="category">
            <option value="Action">Action</option>
            <option value="Animation">Animation</option>
            <option value="Children">Children</option>
            <option value="Classics">Classics</option>
            <option value="Comedy">Comedy</option>
            <option value="Documentary">Documentary</option>
            <option value="Drama">Drama</option>
            <option value="Family">Family</option>
            <option value="Foreign">Foreign</option>
            <option value="Games">Games</option>
            <option value="Horror">Horror</option>
            <option value="Music">Music</option>
            <option value="New">New</option>
            <option value="Sci-Fi">Sci-Fi</option>
            <option value="Sports">Sports</option>
            <option value="Travel">Travel</option>
        </select><br><TT>정렬방법</TT><br>
        <select type="text" name="order">
            <option value="title">제목 오름차순</option>
            <option value="time">시간 적은순</option>
            <option value="last_update">대여 많은순(동일할경우 상영시간 적은순/ 제목 오름차순)</option>
        </select><br>
        <input type="submit" value="Search">
    </form>
    <form action="rating.php" method="GET" class="blank_title">
    <br>영화 등급 별<br><TT>분류방법</TT><br>
        <select type="text" name="rating">
            <option value="G">전체관람가</option>
            <option value="PG">전체관람가~12세관람가</option>
            <option value="PG-13">12세관람가~15세관람가</option>
            <option value="R">15세관람가~청소년관람불가</option>
            <option value="NC-17">청소년관람불가</option>
        </select><br><TT>정렬방법</TT><br>
        <select type="text" name="order">
            <option value="title">제목 오름차순</option>
            <option value="time">시간 적은순</option>
            <option value="last_update">대여 많은순(동일할경우 상영시간 적은순/ 제목 오름차순)</option>
        </select><br>
        <input type="submit" value="Search">
    </form>
</body>

</html>