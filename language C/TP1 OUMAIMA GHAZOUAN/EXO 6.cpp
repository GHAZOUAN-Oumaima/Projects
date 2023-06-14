#include <stdio.h>
#include<math.h>
int main()
{   
    int u0=4,u1=4,n,u,i;
    printf("saisir n");
    scanf("%d",&n); 
    if (n==0)
     printf("4");
    if (n==1)
     printf("4");
    for(i=2;i<=n;i++)
   {
	 u=3*u1+4*u0+6;
    u0=u1;
    u1=u;
    printf("%d",u); 
    
	}
getchar();
     
}
