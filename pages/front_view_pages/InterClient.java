//InterClient.java
import java.rmi.*;
import java.io.*;
import java.sql.*;
public class InterClient {
	BufferedReader br;
	String s1;
	InterClient() {
		try {
			Inter p= (Inter)Naming.lookup("rmi://localhost:1099/abc");
			br=new BufferedReader(new InputStreamReader(System.in));
			System.out.println(" 1. Student's Information");
			System.out.println(" 2. Book's Information");
			System.out.println(" 3. Exit");
			System.out.println("");
			System.out.print("\nEnter ur choice : ");
			while (true) {
				s1 = br.readLine();
				if (s1.equalsIgnoreCase("1")) {
				System.out.println(p.getData("Select * from StudInfo"));
				System.out.print("\nEnter ur choice: ");
				}
				if (s1.equalsIgnoreCase("2")) {
				System.out.println(p.getData("Select * from BookInfo"));
				System.out.print("\nEnter ur choice: ");
				}
				if (s1.equalsIgnoreCase("3")) {
				System.exit(0);
				}
			}
		} catch (Exception e) { e.printStackTrace(); }
	}
	public static void main(String args[]) {
	System.out.println("-----------------------------------------");
	System.out.println("Praful Bhawsar");
	System.out.println("11CE1048");
	System.out.println("-----------------------------------------");
	new InterClient();
	}
}
