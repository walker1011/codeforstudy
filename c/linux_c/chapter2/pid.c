#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
#include <pwd.h>

pid_t getpid(void);
pid_t getppid(void);

uid_t getuid(void);
uid_t geteuid(void);

gid_t getgid(void);
gid_t getegid(void);

/*
struct passwd {
    char *pw_name;
    char *pwd_passwd;
    uid_t pw_uid;
    gid_t pw_gid;
    char *pw_gecos;
    char *pw_dir;
    char *pw_shell;
};
*/
struct passwd *getpwuid(uid_t uid);

int main(int argc, char **argv)
{
    pid_t my_pid, parent_pid;
    uid_t my_uid, my_euid;
    gid_t my_gid, my_egid;
    struct passwd *my_info;
    
    my_pid = getpid();
    parent_pid = getppid();
    my_uid = getuid();
    my_euid = geteuid();
    my_gid = getgid();
    my_egid = getegid();
    my_info = getpwuid(my_uid);

    printf("Process ID: %ld\n", my_pid);
    printf("Parent ID: %ld\n", parent_pid);
    printf("User ID: %ld\n", my_uid);
    printf("Effective User ID: %ld\n", my_euid);
    printf("Group ID: %ld\n", my_gid);
    printf("Effective Group ID: %ld\n", my_egid);

    if (my_info) {
        printf("My Login Name: %s\n", my_info->pw_name);        
        printf("My Password: %s\n", my_info->pw_passwd);        
        printf("My User ID: %ld\n", my_info->pw_uid);        
        printf("My Group ID: %ld\n", my_info->pw_gid);        
        printf("My Real Name: %s\n", my_info->pw_gecos);        
        printf("My Home Dir: %s\n", my_info->pw_dir); 
        printf("My Work Shell: %s\n", my_info->pw_shell);        
    }

    return 0;
}
