//InterServer.java
import java.rmi.*;
import java.rmi.server.*;
import java.sql.*;
public class InterServer extends UnicastRemoteObject implements Inter {
	String str;
	public InterServer() throws RemoteException { }
	public String getData(String QStr)throws RemoteException {
		try {

			Class.forName("sun.jdbc.odbc.JdbcOdbcDriver");
			String dataSourceName = "mdbTest";
			String dbURL = "jdbc:odbc:" + dataSourceName;
			Connection c = DriverManager.getConnection(dbURL, "","");

			Statement s=c.createStatement();
			ResultSet rs=s.executeQuery(QStr);
			ResultSetMetaData rsmd =rs.getMetaData();
			str = "";
			for (int i = 1;i <= rsmd.getColumnCount();i++)
				str=str + rsmd.getColumnName(i) + "\t\t";
			str= str + "\n\n";
			while(rs.next()) {
				for(int i=1;i<=rsmd.getColumnCount();i++)
					str= str + rs.getString(i)+"\t\t";
				str = str + "\n";
			}
		} catch (Exception e) { e.printStackTrace(); }
		return str;
	}
	public static void main(String[] args) {
	System.out.println("-----------------------------------------");
	System.out.println("Praful Bhawsar");
	System.out.println("11CE1048");
	System.out.println("-----------------------------------------");
		try {
			InterServer x=new InterServer();
			Naming.rebind("rmi://localhost:1099/abc",x);
			System.out.println("Server Registered.");
		} catch (Exception e1) { e1.printStackTrace(); }
	}
}
