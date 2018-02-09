import java.util.*;
class Bankers
{public static boolean check(int i,int ins, int work[], int need[][])
	{	int count=0;
		for(int k=0;k<ins;k++)
		{	
			if(need[i][k]<=work[k])
			{
				count++;
			}
		}
		if(count==ins-1)
			return true;
		else	return false;
	}
	public static void main(String args[])
	{
		Scanner source=new Scanner(System.in);
		System.out.println("Enter the number of process : ");
		int n=source.nextInt();
		System.out.println("Enter the no. of instances : ");
		int ins=source.nextInt();
		int alloc[][]=new int[n][ins];
		int max[][]=new int[n][ins];
		int need[][]=new int[n][ins];
		int available[]=new int[ins];
		int work[]=new int[ins];
		boolean finish[]=new boolean[n];
		System.out.println("Enter values for alloc : ");
		for(int i=0;i<n;i++)
			for(int j=0;j<ins;j++)
				alloc[i][j]=source.nextInt();
		System.out.println("Enter values for max : ");
		for(int i=0;i<n;i++)
			for(int j=0;j<ins;j++)
				max[i][j]=source.nextInt();
		System.out.println("Enter values for available : ");
		for(int i=0;i<ins;i++)
			available[i]=work[i]=source.nextInt();
		
		
		for(int i=0;i<n;i++)
			for(int j=0;j<ins;j++)
				need[i][j]=max[i][j]-alloc[i][j];
		System.out.println("Need matrix is : ");
		for(int i=0;i<n;i++)
		{	for(int j=0;j<ins;j++)
				System.out.print(" "+need[i][j]);
			System.out.println();
		}
		for(int i=0;i<n;i++)
			finish[i]=false;
		int count=0,i=0;

		while(count<n)
		{
			for(i=0;i<n;i++)
				if(check(i,ins,work,need))
				{	System.out.println("Request for Process P"+i+" is granted ");
					finish[i]=true;
					count++;
					for(int k=0;k<ins;k++)
					{
						work[k]=work[k]+alloc[i][k];
					}
				}
				
		}
		
	}
}