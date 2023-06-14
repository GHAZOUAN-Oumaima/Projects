#include <stdio.h>
#include<math.h>
int main()
{      int s=0;
       int N;
       printf("saisir un entier");
       scanf("%d",&N);
       for (int i=2 ; i<=sqrt(N) ; i++)
       {
           if (N%i==0)
              s+=1;
           
       }
        if (s==0)
         printf("%d est premier",N);
        else
         printf("%d est NON premier",N);
         
getchar();
		 }
