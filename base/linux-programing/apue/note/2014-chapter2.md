第二章 unix标准化及实现

2.1 引言
  所有标准化工作的一个重要组成部分是对每种实现必须定义的各种限制进行说明。

2.2 UNIX标准化

  ANSI 美国国家标准学会 American National Standards Institute
  IOS  国际标准化组织 International Organization for Standardization
  IEC  国际电子技术委员会 International Electrotechnical Commssion
  IEEE 电气与电子工程师协会 Institute of Electrical and Electronics Engineers
  
  POSIX 可移植的操作系统接口 Portable Operating System Interface
  
  1. ISO C 标准
    ISO/IEC JTC1/SC22/WG14 简称WG14 （维护组织）
    ISO/IEC 9899:1990 (89)
    ISO/IEC 9899:1999 
    还定义了标准库。
  
    该标准定义了24个头文件，可将ISO C库分成24个区
    assert.h    验证程序断言
    complex.h   支持复数算数运算
    ctype.h     字符类型
    errno.h     出错码
    fenv.h      浮点环境
    float.h     浮点常量
    inttypes.h  整形格式转换
    iso646.h    替代关系操作符宏
    limits.h    实现常量
    locale.h    局部类别
    math.h      数学常量
    setjmp.h    非局部goto
    signal.h    信号
    stdarg.h    可变参数表
    stdbool.h   布尔类型和值
    stddef.h    标准定义
    stdint.h    整形
    stdio.h     标准IO库
    stdlib      实用程序函数
    string.h    字符串操作
    tgmath.h    通用类型数学宏
    time.h      时间和日期
    wchar.h     扩展的多字节和宽字符支持
    wctype.h    宽字符分类和映射支持
  
    ISO C头文件依赖于操作系统所配置的C编译器的版本
    
  2. IEEE POSIX
    原来只是IEEE1003.1-1988（操作系统接口）
    后来扩展成包括很多标记为1003的标准及标准草案，包括shell和实用程序(1003.2）
    
    标准的目的是提高应用程序在各种UNIX系统环境之间的可移植性。
    定义了依从POSIX（POSIX compliant）操作系统必须提供的各种服务。（不限于unix系统）
    
    由于1003.1标准定义了一个接口interface而不是一种实现implementation,所以并不区分系统调用和库函数，标准中的所有例程都称为函数。
    
    POSIX.1 = ISO/IEC 9945-1:1990
    标准不断发展，推出了更多的扩展，比如实时扩展，线程等等
    
    POSIX.1 指定的必需的头文件，包含ISO C的头文件
    dirent.h        目录项
    fcntl.h         文件控制
    fnmatch.h       文件名匹配类型
    glob.h          路径名模式匹配类型
    grp.h           组文件
    netdb.h         网络数据库操作
    pwd.h           口令文件
    regex.h         正则表达式
    tar.h           tar归档值
    termios.h       终端IO
    unistd.h        符号常量
    utime.h         文件时间
    wordexp.h       子扩展类型
    arpa/inet.h     Internet定义
    net/if.h        套接字本地接口
    netinet/in.h    Internet地址族
    netinet/tcp.h   传输控制协议定义
    sys/mman.h      内存管理声明
    sys/select.h    select函数
    sys/socket.h    套接字接口
    sys/stat.h      文件状态
    sys/times.h     进程时间
    sys/types.h     基本系统数据类型
    sys/un.h        UNIX域套接字定义
    sys/utsname.h   系统名
    sys/wait.h      进程控制
    
    POSIX标准定义的XSI扩展头文件
    cpio.h          cpio归档值
    dlfcn.h         动态链接
    fmtmsg.h        消息显示结构
    ftw.h           文件树漫游
    iconv.h         代码集转换实用程序
    langinfo.h      语言信息常量
    libgen.h        模式匹配函数定义
    monetary.h      货币类型
    ndbm.h          数据库操作
    nl_types.h      消息类型
    poll.h          轮训函数
    search.h        搜索表
    strings.h       字符串操作
    syslog.h        系统出错日志记录
    ucontext.h      用户上下文
    ulimit.h        用户限制
    utmpx.h         用户账户数据库
    sys/ipc.h       IPC
    sys/msg.h       消息队列
    sys/resource.h  资源操作
    sys/sem.h       信号量
    sys/shm.h       共享存储
    sys/statvfs.h   文件系统信息
    sys/time.h      时间类型
    sys/timeb.h     附加的日期和时间定义
    sys/uio.h       矢量IO操作
    
    POSIX标准定义的可选头文件
    aio.h           异步IO
    mqueue.h        消息队列
    pthread.h       线程
    sched.h         执行调度
    semaphore.h     信号量
    spawn.h         实时spawn接口
    stropts.h       XSI STREAMS接口
    trace.h         事件跟踪
    
  3. Single UNIX Specification
    单一UNIX规范，是POSIX.1标准的一个超集，定义了一些附加的接口。
    X/Open系统接口
    
  4. FIPS
    Federal Information Processing Standard 联邦信息处理标准
    美国政府出版，用于计算机系统的采购。
    
2.3 UNIX系统的实现
  主要的三个标准 ISO C、 IEEE POSIX Single UNIX specification
  
  SVR4
  BSD
  FreeBSD
  Linux
  MAC OS X
  Solaris
  
2.4 标准和实现的关系

2.5 限制
  编译时限制
  运行时限制
  
  三种限制
  1. 编译时限制
  2. 不与文件或目录相关联的运行时限制（sysconf）
  3. 与文件活目录相关联的运行时限制 pathconf、fpathconf
  
  ISO C 限制
  
  部分细节可以到最后再研究