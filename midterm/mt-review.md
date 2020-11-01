# 새로 배운 내용 및 정리
- SQL문 GROUP BY절
> 데이터를 원하는 그룹으로 분류<br>
나누고자 하는 그룹의 컬럼명을 SELECT절과 GROUP BY절 뒤에 추가<br>
집계함수와 함께 사용되는 상수는 GROUP BY 절에 추가하지 않아도 됨.<br><br>
>- DISTINCT와 GROUP BY절의 차이
>>- DISTINCT<br>
특정 그룹 구분없이 중복된 데이터 제거
>>- GROUP BY<br>
집계함수를 사용하여 특정 그룹으로 구분
- SQL문 HAVING절
> WHERE절에서는 사용할 수 없는 집계함수를 이용하여 조건 비교 시 사용.<br>
GROUP BY절과 함께 사용.

# 문제 발생 및 해결 내용
- 오류내용
<br>[04:50:02.693] > ssh: connect to host 127.0.1.1 port 22: Connection refused]0;C:\WINDOWS\System32\cmd.exe
<br>[04:50:02.693] Got some output, clearing connection timeout
<br>[04:50:02.714] > 프로세스에서 없는 파이프에 쓰려고 했습니다.
<br>분명히 22, 80, 443 포트 열려있는거 확인했는데...
> 해결: 가상머신 다시 새로 설치하여 해결(5주, 6주 강의 참고)
- 오류내용
<br>vscode에 새 폴더를 추가하려고 하니까 퍼미션 오류발생
>- 문제: 권한이 내가 만든 계정인 mid가 아니라 root계정에 있었기 때문에 이러한 문제 발생
>- 해결: 원하는 디렉토리의 상위 디렉토리에서 sudo chown -R mid.mid /var/www/라고 명령어 입력하여 권한 바꿔줘서 해결
- 오류내용
<br>데이터를 다운받으려고 SOURCE C:/temp/sakila-db/sakila-schema.sql; 명령을 치니까 이러한 오류 발생
<br>ERROR: Failed to open file 'C:/temp/sakila-db/sakila-schema.sql', error: 2
>- 문제: 검색해보니 경로가 잘못 설정되어있어서 발생하는 오류라고 함
>- 해결: 내가 지금 쓰고 있는 가상머신의 리눅스가 아니라 윈도우의 C드라이브에 파일을 저장했기때문이라고 나는 생각함. 
<br>1) 다운받았던 sakila-db폴더를 깃헙에 업로드
<br>2) 현재 사용하고 있는 리눅스에 파일 다운로드
<br>3) vscode에서 다운받은 파일에 오른쪽버튼을 눌러 경로 복사 (단축키 shift + alt + c)
<br>4) SOURCE schema파일 복사한 경로;
<br>5) SOURCE data파일 복사한 경로;
<br>이렇게 입력했더니 정상적으로 다운 받아짐.

# 참고 내용
- [SOURCE error: 2]<br>
https://stackoverflow.com/questions/14684063/mysql-source-error-2
- [리눅스의 10가지 장단점]<br>
https://i-hate-advertisement-post.tistory.com/175
- [아파치 웹서버]<br>
http://wiki.hash.kr/index.php/%EC%95%84%ED%8C%8C%EC%B9%98_%EC%9B%B9%EC%84%9C%EB%B2%84
- [MariaDB 장점]<br>
https://dtaxi.tistory.com/964
- [where절 여러개 입력]<br>
https://inforyou.tistory.com/28
- [group by]<br>
http://www.gurubee.net/lecture/1032


# 회고
- 이번에도 역시나 환경설정 하는데 제일 시간을 많이 들었다. 왜 내 컴퓨터에서는 똑같이 따라해도 문제가 해결이 안되는 것일까..?
- 이번에 과제를 할 때는 조금 더 세부적으로 데이터를 추출해보고 싶어서 범주와 정렬기준 이렇게 두가지 조건을 통해 쿼리문을 짜게되었는데, 생각보다 조인할 테이블이 많지 않았다. 다만 테이블과 조건문이 여러개라서 그 구조를 파악하고 조건을 짜는게 조금 까다로웠다.
-  몇주간 계속 과제를 하면서 고민하고 구글링으로 찾아보다보니까 처음엔 쿼리문이 익숙하지 않았는데 지금은 훨씬 재밌게 쿼리문을 짤 수 있게된 것 같다.
