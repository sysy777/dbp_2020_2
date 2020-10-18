# 과제 내용
- 부서별 연봉 top 5에 해당하는 직원 이름과 직원 연봉 확인

# 과제영상
https://youtu.be/-z1J6SKMQPY

# 새로 배운 내용 및 정리
### MySQL 함수 (출처: Avance 1step 네이버 블로그)
- mysqli_connect()
>- 함수설명: 데이터베이스에 접속한 뒤 연결이 되면 MySQL 연결 정보를 객체로 되돌려줌.
>- 프로토타입: resource mysqli_connect([string host], [string username], [string password],[string dbname], [int port], [string socket])
>- host : MySQL 서버 주소
>- username : 데이터베이스 사용자 계정
>- password : 데이터베이스 사용자 비밀번호
>- dbname : 선택할 데이터베이스 이름
>- port : MySQL 서버 포트 번호
>- socket : 소켓 또는 명명된 파이프

- mysqli_close()
>- 함수설명: 데이터베이스 접속 종료
>- 프로토타입: bool mysqli_close(mysqli link)
>- link : MySQL 연결 객체

- mysqli_select_db()
>- 함수설명: 사용할 데이터 베이스 선택. mysqli_connect()함수 자체만으로도 데이터베이스 선택이 가능하므로 이 함수는 데이터베이스를 중간에 변경할 때 많이 사용.
>- 프로토타입: bool mysqli_select_db(mysqli link, string dbname)
>- link : MySQL 연결 객체
>- dbname : 선택할 데이터베이스 이름

- mysqli_real_query()
>- 함수설명: 데이터베이스에 쿼리 전송. 쿼리 결과를 얻으려면 mysqli_use_result()나 mysql_store_result()함수 사용
>- 프로토타입: bool mysqli_real_query(mysql link, string query)
>- link : MySQL 연결 객체
>- query : 쿼리

- mysqli_store_query()
>- 함수설명: 마지막 쿼리 결과를 레코드로 전송. insert쿼리나 결과 레코드를 읽어오지 못했을 때 false 반환.
>- 프로토타입: 
mysqli_result mysqli_store_result(mysqli link)
>- link : MySQL 연결 객체

- mysqli_use_query()
>- 함수설명: 마지막 수행된 쿼리의 결과 레코드 조회. mysqli_use_result() 혹은 mysqli_store_result() 중 하나는 쿼리 결과 취득 전 반드시 호출되어야 함.
>- 프로토타입: 
mysqli_result mysqli_use_result(mysqli link)
>- link : MySQL 연결 객체

- mysqli_query()
>- 함수설명: mysqli_real_query() 함수를 호출한 후 mysqli_use_result() 혹은 mysqli_store_result() 함수를 호출한 것과 같음. resultmode의 디폴트 값은 mysqli_store_result.
>- 프로토타입: 
mixed mysqli_query(mysqli link, string query, [int resultmode])
>- link : MySQL 연결 객체
>- query : 쿼리
>- resultmode : mysqli_use_result / mysqli_store_result

- mysqli_multi_query()
>- 함수설명: 데이터베이스에 하나 이상의 쿼리 전송. MySQLi 클래스에서만 지원. 쿼리 결과 레코드를 얻으려면 mysqli_use_result() 함수나 mysql_store_result()함수를 사용해야 함.
>- 프로토타입: 
bool mysql_multi_query(mysql link, string query)
>- link : MySQL 연결 객체
>- query : 쿼리

- mysqli_next_result()
>- 함수설명: mysqli_multi_query() 함수에 의해서 실행된 결과의 다음 레코드를 가져올 수 있도록 준비
>- 프로토타입: 
bool mysqli_next_result(mysqli link)
>- link : MySQL 연결 객체

- mysqli_more_result()
>- 함수설명: mysqli_multi_query() 함수에 의한 결과 레코드가 더 남아있는지 확인. 결과가 남아있으면 true, 안남아있으면 false 반환
>- 프로토타입: 
bool mysqli_more_result(mysqli link)
>- link : MySQL 연결 객체

- mysqli_fetch_array()
>- 함수설명: mysqli_query(), mysqli_use_result(), mysqli_store_result() 함수의 결과인 mysqli_result 객체를 입력받아 결과 레코드를 배열로 반환. mysql_fetch_array() 함수와 동일
>- 프로토타입: 
mixed mysqli_fetch_array(mysqli_result result, [int resulttype])
>- link : MySQL 연결 객체>
>- resulttype : MYSQLI_ASSOC, MYSQLI_NUM, MYSQLI_BOTH

- mysqli_free_result()
>- 함수설명: 쿼리결과를 메모리에서 해제
>- 프로토타입: 
void mysqli_free_result(mysqli_result result)
>- result : MySQLi 결과 객체

### PHP 문법 정리
- Php는 변수의 타입을 변수 선언 시 정하지x<br>값이 들어오면 그때서야 값을 해석하여 타입을 정함.
> 타입으로 인한 에러 발생 시 바로 잡아주기 어려움
- Print는 true라는 리턴값이 있는 함수<br>Ehco는 리턴값이 없음 > 함수x
- gettype(변수명): 변수의 타입 가져옴.<br>settype(변수명): 변수의 타입 지정
- 문자열에 “ 나 ‘ 를 직접 사용하고 싶으면 \(백슬래쉬) 뒤에 따옴표 붙임
- 문자열 안에 변수를 사용 시 “” 안에 {}(중괄호) 사용
- 문자와 문자(또는 변수)를 연결 시 .(마침표)를 사용
- 연관배열: 기본적으로 배열은 인덱스와 인덱스에 해당하는 값이 있음. 근데 연관배열은 인덱스가 숫자가 아니라 의미 있는 단어가 들어갈 수 있음.
> ex) array의 0번째에 10이라는 값을, 1번째에 20이라는 값을 넣는다고 할 때 인덱스 번호인 0, 1대신에 의미 있는 단어인 first, second를 사용.
- count(변수명): 배열 요소 개수 출력
- var_dump(배열변수명): 배열 형태로 출력<br>배열 선언시 []이용할 수도 있지만 가독성을 위해서 array()라고 명시.
- array_merge(배열1, 배열2): 배열1뒤에 배열2 합침.
- sort(배열변수명): 배열 값 정렬
- Foreach(): 배열의 값이 있으면 계속 반복(그냥for문을 쓰면 반복횟수를 적어줘야하는데 foreach는 그럴 필요x)

# 문제 발생 및 해결 내용
- VMware를 실행하려고 하니까 
> Error while powering on: Unable to open kernel device '\\.\VMCIDev\VMX': 작업을 완료했습니다. Did you reboot after installing VMware Player? Module 'DevicePowerOn' power on failed. Failed to start the virtual machine.
라는 에러가 발생하면서 VMware가 꺼짐.
> - 문제점
>> 노트북에 깔린 윈도우를 업데이트 해서 그런것일까? 아직 원인을 알 수 없다.<br> my VMware라는 사이트에 따르면 'VMware Workstation이 호스트에 올바르게 설치되지 않은 경우 발생합니다.'라는 이유때문에 이러한 문제가 발생한 것이라고 함.
> - 해결
>> 제어판 - 프로그램 제거 - VMware 더블클릭 > next버튼 > repair버튼 > finish > VMware재실행

- 위와 같은 해결법으로 VMware 재실행하고나니까 host주소가 바뀌어서 이전의 파일을 열 지 못하는 문제 발생..
(Install terminal quit with output: ]0;C:\WINDOWS\System32\cmd.exe프로세스에서 없는 파이프에 쓰려고 했습니다.)
> - 문제점
>> host컴퓨터의 주소 변경
> - 해결
>> - vscode 검색창에서 configFile을 열어서 Host와 HostName을 현재 Host주소로 수정. -> 실패
>> - 5주차 6주차 수업시간에 했던 리눅스 명령어들로 host서버의 방화벽상태와 아파치서버 구동상태확인 > 잘 열려있고 잘 작동함.
>> - f1눌러서 ssh test@host주소 입력해서 추가했더니 파일이 열리긴 열렸음... 그런데 왜!!!! home/test/만 있고 var/www/html/을 들어갈 수 가 없을까!!!!! var디렉토리조차 없다... 절망적이다... 어떻게 해야 해결할 수 있을까..?
>> - 결국 VMware에 ubuntu 64bits (2)라는 새로운 가상머신을 하나 파서 처음부터 다시 설정을 한 끝에 해결.. (5주차 6주차 환경 설정 수업 참여)

- 쿼리를 작성해서 터미널에서는 출력이 되는데 php코드로 옮겨서 웹상에서 확인해보니 결과가 제대로 나오지 않음.
>- 문제점
>> print_r($query)를 해서 현재 쿼리상태를 확인한 결과 변수와 쿼리string을 연결하는데서 문제가 있었음.
> - 해결
>> print_r($query)를 한 결과<br>$query의 where dept_emp.dept_no=\"'$filtered_dept'\"부분을<br>where dept_emp.dept_no='$filtered_dept'로 바꾸었더니 해결됨.


# 참고 내용
- VMware 실행 오류 (VMware unable to open kernel device ~)
https://gmyankee.tistory.com/187
> 나는 이사람과 다른 상태에 있었음. 나는 service.msc를 실행했을때 VMwareAuthorization~이 이미 실행중이었음. 그래서 이 사람이 포스팅한대로 따라했지만 똑같은 오류가 반복됨.
https://kb.vmware.com/s/article/2044686
- VScode remote ssh 확장 사용
https://daewonyoon.tistory.com/317
- MySQL 함수 정리
https://m.blog.naver.com/PostView.nhn?blogId=hell_titan&logNo=130107642321&proxyReferer=https:%2F%2Fwww.google.com%2F
- inner join
http://egloos.zum.com/sweeper/v/3002133
- distinct
https://epdl-studio.tistory.com/32

# 회고
- 환경설정하는데 시간이 너무 많이 걸렸다.. 거의 한 3일동안 붙잡고 있었던 것 같다. 사실 슬랙에 올리면 금방 답을 구할 수 있었을 테지만 뭔가 아무것도 찾지도 않고 올리면 앞으로 계속 그렇게 쉽게쉽게 정보를 얻으려고 할 것 같아서 좀 더 찾으려고 했던 것 같다. 그렇지만.. 그래도 3일은 너무 길었다. 다음번에는 하루정도 최선을 다해서 검색해보고 고민해본뒤에 바로 슬랙에 올리는 걸로!
- 직접 문제를 만들고 쿼리 짜는게 생각하고 오류 고치느라 시간은 오래 걸렸지만 하나하나 바꿔가면서 오류찾는 재미가 있는 것 같다.
- distinct 키워드는 모든 컬럼에 대해서 적용된다. 특정 컬럼에 대해서 적용되지 x
- 같은 사람은 한 번만 출력되게 하고 싶었는데 distinct가 특정 컬럼을 대상으로 할 수가 없어서 고칠 수 없었다.. 어떻게 해야 한 사람은 한 번만 컬럼에 나올 수 있을까? 의문만... 남았다...
- 과제 쿼리문을 돌릴 때 웹상에서 처음 부서를 클릭했을 때는 데이터를 찾는데 많은 시간이 걸렸는데 한번 데이터를 찾은 부서는 다음에 클릭할 때 빠르게 데이터를 표시해주었다. 이게 어떤 원리로 이렇게 되는지 궁금하다. 한 번 찾은 데이터는 어떤 변수에 값을 계속 기록을 해두는 것인가? 
