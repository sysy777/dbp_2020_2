# 과제 내용


# 과제영상


# 새로 배운 내용


# 문제 발생 및 해결 내용
- VMware를 실행하려고 하니까 
> Error while powering on: Unable to open kernel device '\\.\VMCIDev\VMX': 작업을 완료했습니다. Did you reboot after installing VMware Player? Module 'DevicePowerOn' power on failed. Failed to start the virtual machine.
라는 에러가 발생하면서 VMware가 꺼짐.
> - 문제점
> 노트북에 깔린 윈도우를 업데이트 해서 그런것일까? 아직 원인을 알 수 없다.<br> my VMware라는 사이트에 따르면 'VMware Workstation이 호스트에 올바르게 설치되지 않은 경우 발생합니다.'라는 이유때문에 이러한 문제가 발생한 것이라고 함.
> - 해결
> 제어판 - 프로그램 제거 - VMware 더블클릭 > next버튼 > repair버튼 > finish > VMware재실행

- 위와 같은 해결법으로 VMware 재실행하고나니까 host주소가 바뀌어서 이전의 파일을 열 지 못하는 문제 발생..
(Install terminal quit with output: ]0;C:\WINDOWS\System32\cmd.exe프로세스에서 없는 파이프에 쓰려고 했습니다.)
> - 문제점
> host컴퓨터의 주소 변경
> - 해결
1) vscode 검색창에서 configFile을 열어서 Host와 HostName을 현재 Host주소로 수정. -> 실패




# 참고 내용
- VMware 실행 오류 (VMware unable to open kernel device ~)
https://gmyankee.tistory.com/187
> 나는 이사람과 다른 상태에 있었음. 나는 service.msc를 실행했을때 VMwareAuthorization~이 이미 실행중이었음. 그래서 이 사람이 포스팅한대로 따라했지만 똑같은 오류가 반복됨.
https://kb.vmware.com/s/article/2044686


# 회고

