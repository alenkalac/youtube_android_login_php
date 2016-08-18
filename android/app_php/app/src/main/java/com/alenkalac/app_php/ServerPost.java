package com.alenkalac.app_php;

import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.net.HttpURLConnection;
import java.net.URL;

/**
 * Created by Alen Kalac on 18/08/2016.
 */
public class ServerPost extends AsyncTask<String, Void, Void> {

    private Context context;
    private String data;
    private boolean success = false;

    private String host = "http://192.168.2.100:8888";

    public ServerPost(Context context, String data) {
        this.context = context;
        this.data = data;
    }

    @Override
    protected Void doInBackground(String... params) {

        HttpURLConnection connection = null;
        URL url = null;

        try {
            if(params[0].equals("login"))
                url = new URL(this.host + "/login.php");
            else if(params[0].equals("register"))
                url = new URL(this.host + "/register.php");

            connection = (HttpURLConnection)url.openConnection();
            connection.setRequestMethod("POST");
            connection.setDoInput(true);
            connection.setDoOutput(true);

            OutputStream os = connection.getOutputStream();

            BufferedWriter bw = new BufferedWriter(new OutputStreamWriter(os));
            bw.write(this.data);
            bw.flush();
            bw.close();
            os.close();

            int resCode = connection.getResponseCode();

            if(resCode == HttpURLConnection.HTTP_OK) {

                BufferedReader br  = new BufferedReader(new InputStreamReader(connection.getInputStream()));

                String line = "";
                String response = "";

                while((line = br.readLine()) != null) {
                    response += line;
                }

                if(response.equals("1"))
                    this.success = true;

                br.close();
            }


        }catch(Exception e) {
            e.printStackTrace();
        }


        return null;
    }

    @Override
    protected void onPostExecute(Void aVoid) {
        super.onPostExecute(aVoid);

        if(this.success) {
            Intent intent = new Intent(this.context, loginSuccess.class);
            this.context.startActivity(intent);
        } else {
            //user didnt log in with correct info
        }

    }
}
