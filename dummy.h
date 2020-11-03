#define FFI_SCOPE "DUMMY"
#define FFI_LIB "libc.so.6"

typedef unsigned int time_t;
typedef unsigned int suseconds_t;

struct timeval {
    time_t      tv_sec;
    suseconds_t tv_usec;
};

struct timezone {
    int tz_minuteswest;
    int tz_dsttime;
};

int gettimeofday(struct timeval *tv, struct timezone *tz);
int printf(const char *format, ...);