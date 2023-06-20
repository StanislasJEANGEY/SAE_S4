import 'package:flutter/material.dart';
import 'package:minipress/screens/minipress_master.dart';

class MinipressApp extends StatefulWidget {
  const MinipressApp({Key? key}) : super(key: key);

  @override
  State<MinipressApp> createState() => _MinipressAppState();
}

class _MinipressAppState extends State<MinipressApp> {
  @override
  Widget build(BuildContext context) {
    return Builder(
      builder: (BuildContext context) {
        return const MaterialApp(
          title: 'Minipress',
          home: MinipressMaster()
        );
      }
    );
  }
}