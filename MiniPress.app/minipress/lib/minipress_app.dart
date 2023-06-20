import 'package:flutter/material.dart';
import 'package:minipress/providers/minipress_provider.dart';
import 'package:minipress/screens/minipress_master.dart';
import 'package:provider/provider.dart';

class MinipressApp extends StatefulWidget {
  const MinipressApp({Key? key}) : super(key: key);

  @override
  State<MinipressApp> createState() => _MinipressAppState();
}

class _MinipressAppState extends State<MinipressApp> {
  @override
  Widget build(BuildContext context) {
    return ChangeNotifierProvider(
      create: (context) => MinipressProvider(),
      child: const MaterialApp(
        title: 'Material App',
        home: MinipressMaster(),
      ),
    );
  }
}