package com.alenkalac.app_php;

import android.content.Context;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {

    private Context context;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);

        this.context = this;

        Button loginBtn = (Button)findViewById(R.id.login_btn);
        Button registerBtn = (Button)findViewById(R.id.register_btn);

        loginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                EditText username_txt = (EditText)findViewById(R.id.username_txt);
                EditText password_txt = (EditText)findViewById(R.id.password_txt);

                String username = username_txt.getText().toString();
                String password = password_txt.getText().toString();

                String data = "login&username=" + username + "&password=" + password;

                new ServerPost(context, data).execute("login");
            }
        });

        registerBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                EditText username_txt = (EditText)findViewById(R.id.username_txt);
                EditText password_txt = (EditText)findViewById(R.id.password_txt);

                String username = username_txt.getText().toString();
                String password = password_txt.getText().toString();

                String data = "register&username=" + username + "&password=" + password;

                new ServerPost(context, data).execute("register");
            }
        });

    }
}
